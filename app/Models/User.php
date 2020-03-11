<?php
/*
* @created 24/02/2020 - 10:16 PM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\AddSubscriberRequest;

class User
{
    public function register($username, $email, $password, $token, $created_at) {
        \DB::table('users')->insert(
           ['username' => $username, 'email' => $email, 'password' => md5($password), 'token' => $token, 'active' => 0, 'created_at' => $created_at, 'updated_at' => $created_at, 'id_role' => 2]
        );
    }

    public function confirmRegister($token) {
        \DB::table('users')
            ->where('token', $token)
            ->update(['active' => 1]);
    }

    public function doLogin($username, $password) {
        return \DB::table('users')
                ->select('id_user', 'username', 'email', 'id_role')
                ->where(['username' => $username, 'password' => md5($password), 'active' => 1])
                ->first();
    }

    public function resetPassword($email, $password) {
        \DB::table('users')
            ->where('email', $email)
            ->update(['password' => md5($password)]);

    }

    public function addSubscriber(AddSubscriberRequest $request) {
        \DB::table('subscribers')
            ->insert(['email' => $request->input('email')]);
    }


}
