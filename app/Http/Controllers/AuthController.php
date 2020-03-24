<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSubscriberRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Services\BackWithError;
use App\Http\Services\LogCatchs;
use App\Http\Services\SendMailer;
use App\Http\Services\UserWishes;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }

    public function doLogin(LoginRequest $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = $this->modelUser->doLogin($username, $password);

        if ($user) {
            $request->session()->put('user', $user);
            LogCatchs::writeLogSuccess('User: ' . $user->username . 'm Action: Login');
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('wrongPass', 'Wrong Password or Account is Inactive!');
        }

    }


    public function logout(Request $request) {
        LogCatchs::writeLogSuccess('User: ' . session('user')->username . ',  Action: Logout');
        $request->session()->forget("user");
        return redirect()->route('login')->with('success', 'You are not logged anymore!');
    }

    public function doRegister(RegistrationRequest $request) {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $token = sha1(rand()) . time();
        $created_at = date("Y-m-d H-i-s", time());

        try{
            $this->modelUser->register($username, $email, $password, $token, $created_at);

            $title = 'E&E Email Verification Required';
            $body = "Activate your account by clicking on: <a href='http://127.0.0.1:8000/confirm/{$token}'>This link</a>";
            $subject = 'Activation';

            SendMailer::sendMail($title, $subject, $body, $email);
            LogCatchs::writeLogSuccess('User: ' . $username . ',  Action: Register');
            return redirect()->back()->with('success', 'Go to your mail and confirm registration');

        } catch(\PDOException $ex) {
            return redirect()->back()->withInput();
            LogCatchs::writeLog($ex->getMessage(), 'AuthController@doRegister');
        }

    }

    public function confirmRegister($token) {
        $this->modelUser->confirmRegister($token);
        return redirect()->route('login')->with('success', 'You have activated your account');
    }

    public function reset(ResetRequest $request) {

        $newPass = substr(sha1(rand()) . time(), 0, 10). "!";
        $email = $request->input("reset_email");
        try {
            $this->modelUser->resetPassword($email, $newPass);

            $title = 'E&E Reset Password Request';
            $body ="Your new password is: {$newPass}";
            $subject = 'Password Reset';


            SendMailer::sendMail($title, $subject, $body, $email);
            LogCatchs::writeLogSuccess('User: ' . $email . ', Action: Reset password');
            return redirect()->route('login')->with('success', "Check mail for new password.");
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'AuthController@reset');
            return BackWithError::backWtihError();
        }

    }

    public function sendContact(ContactRequest $request) {
        try {
            $title = "Contact - Form";
            $adminMail = 'filip.minic98@gmail.com';

            SendMailer::sendMail($title, $request->input('email'), $request->input('message'), $adminMail);
            LogCatchs::writeLogSuccess('User: ' . $request->input('email') . ',  Action: Contact Form');

            return response(null, 201);
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'AuthController@sendContact');
            return response(null, 500);
        }
    }

    public function addSubscriber(AddSubscriberRequest $request) {
        try {
            $this->modelUser->addSubscriber($request);
            LogCatchs::writeLogSuccess('User: ' . $request->input('email') . ',  Action: Subscribed');

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'AuthController@addSubsciber');
            return response(null, 500);
        }
    }

}
