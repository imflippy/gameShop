<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailToSubsRequest;
use App\Http\Services\BackWithError;
use App\Http\Services\LogCatchs;
use App\Http\Services\SendMailer;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index() {

        return view('admin.pages.subscriptions');
    }

    public function store(SendMailToSubsRequest $request){

        $modelUser = new User();
        $title = $request->input('title');
        $subject = $request->input('subject');
        $body = $request->input('content-mail');
        try{
            $users = $modelUser->getAllSubs();
            foreach ($users as $u) {
                $mail[] = $u->email;
            }
            SendMailer::sendMail($title, $subject, $body, $mail);
            return redirect()->route('subs.index')->with('success', 'Mails has been sent');
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\SubscriptionController@store');
            return BackWithError::backWtihError();
        }
        if(empty($u)) {
            return BackWithError::backWtihError('There are no subscribers');
        }

    }

}
