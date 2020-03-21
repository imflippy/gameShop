<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Services\BackWithError;
use App\Http\Services\LogCatchs;
use App\Models\Comments;
use App\Models\User;
use App\Models\Wishes;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelUser;
    public function __construct()
    {
        $this->modelUser = new User();
    }

    public function index()
    {
        $users = $this->modelUser->getAllUsersWithPagination();

        return view('admin.pages.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->modelUser->getAllRoles();
//        dd($roles);
        return view('admin.pages.user_create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        try {
            $this->modelUser->registerUser($request);
            return redirect()->route('users.index')->with('success', 'User has been added');
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\UsersController@store');
            return BackWithError::backWtihError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roles = $this->modelUser->getAllRoles();
        $getUser = $this->modelUser->getOneUser($id);

        return view('admin.pages.user_edit', ['roles' => $roles, 'getUser' => $getUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        try {
            $this->modelUser->updateUser($request, $id);
            return redirect()->route('users.index')->with('success', 'User has been updated');
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\UsersController@update');
            return BackWithError::backWtihError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelWishes = new Wishes();
        $modelComments = new Comments();
        \DB::beginTransaction();
        try {


            $modelWishes->deleteUserWish($id);
            $modelComments->deleteUserCommets($id);
            $this->modelUser->deleteUser($id);
            \DB::commit();
            return redirect()->route('users.index')->with('success', 'User has been deleted');
        } catch (\PDOException $ex) {

            \DB::rollBack();
            LogCatchs::writeLog($ex->getMessage(), 'Admin\UsersController@destroy');
            return BackWithError::backWtihError();
        }
    }
}
