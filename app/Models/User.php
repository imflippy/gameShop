<?php
/*
* @created 24/02/2020 - 10:16 PM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\AddSubscriberRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

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

    public function getAllSubs() {
        return \DB::table('subscribers')->get();
    }


    //Admin
    public function getAllUsersWithPagination() {
        return \DB::table('users')
            ->join('roles', 'users.id_role', '=', 'roles.id_role')
            ->select('id_user', 'username', 'email', 'active', 'role')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
    }

    public function getAllRoles() {
        return \DB::table('roles')->get();
    }

    public function registerUser(AddUserRequest $request) {
        \DB::table('users')->insert(
            [
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => md5($request->get('password')),
                'token' => sha1(rand()) . time(),
                'active' => $request->get('activity'),
                'created_at' => date("Y-m-d H-i-s", time()),
                'updated_at' => date("Y-m-d H-i-s", time()),
                'id_role' => $request->get('rolesDll')
            ]
        );
    }

    public function deleteUser($id) {
        \DB::table('users')
            ->where(['id_user' => $id])
            ->delete();
    }

    public function getOneUser($id) {
        return \DB::table('users')
            ->select('id_user', 'username', 'email', 'active', 'id_role')
            ->where(['id_user' => $id])
            ->first();
    }

    public function updateUser(EditUserRequest $request, $id) {
        \DB::table('users')
            ->where('id_user', $id)
            ->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'token' => sha1(rand()) . time(),
                'active' => $request->get('activity'),
                'updated_at' => date("Y-m-d H-i-s", time()),
                'id_role' => $request->get('rolesDll')
            ]);
    }
}
