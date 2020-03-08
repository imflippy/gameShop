<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Services\SendMailer;
use App\Http\Services\UserWishes;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends FrontEndController
{
    private $modelUser;

    public function __construct()
    {
        parent::__construct();
        $this->modelUser = new User();
    }

    public function indexLogin() {

        $form = [
            [
                "type" => 'text',
                "name" => 'username',
                "placeholder" => "Type your username"
            ],
            [
                "type" => 'password',
                "name" => 'password',
                "placeholder" => "Type your password"
            ]
        ];

        $button = [
            "name" => "login",
            "value" => "LOGIN"
        ];

        $this->data['form'] = $form;
        $this->data['button']  =$button;
        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();

        return view("pages.login", $this->data);
    }

    public function doLogin(LoginRequest $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = $this->modelUser->doLogin($username, $password);

        if ($user) {
            $request->session()->put('user', $user);

            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('wrongPass', 'Wrong Password or Account is Inactive!');
        }

    }


    public function logout(Request $request) {
        $request->session()->forget("user");
        return redirect()->route('login')->with('success', 'You are not logged anymore!');
    }

    public function indexRegister() {
        $form = [
            [
                "name" => 'username',
                "placeholder" => "Your username here",
                "value" => old('username')
            ],
            [
                "type" => 'email',
                "name" => 'email',
                "placeholder" => "Your email here",
                "value" =>  old('email')
            ],
            [
                "type" => 'password',
                "name" => 'password',
                "placeholder" => "Enter passward"
            ],
            [
                "type" => 'password',
                "name" => 'confirmPassword',
                "placeholder" => "Confirm password"
            ]
        ];
        $button = [
            "name" => "register",
            "value" => "register"
        ];

        $this->data['form'] = $form;
        $this->data['button'] = $button;
        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();

        return view("pages.register", $this->data);
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

            SendMailer::sendMail($title, $subject, $body);

            return redirect()->back()->with('success', 'Go to your mail and confirm registration');

        } catch(\PDOException $ex) {
            return redirect()->back()->withInput();
            return response(["Error with register" => $ex->getMessage()], 500);
        }

    }

    public function confirmRegister($token) {
        $this->modelUser->confirmRegister($token);
        return redirect()->route('login')->with('success', 'You have activated your account');
    }

    public function reset(ResetRequest $request) {

        $newPass = substr(sha1(rand()) . time(), 0, 10). "!";
        $email = $request->input("reset_email");

        $this->modelUser->resetPassword($email, $newPass);

        $title = 'E&E Reset Password Request';
        $body ="Your new password is: {$newPass}";
        $subject = 'Password Reset';

        SendMailer::sendMail($title, $subject, $body);
        return redirect()->route('login')->with('success', "Check mail for new password.");

    }

    public function contactPage() {
        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();

        return view('pages.contact', $this->data);
    }


}
