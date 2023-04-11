<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreUserRequest;
use App\Http\Requests\Backend\UpdateUserRequest;
use App\Http\Requests\StoreGroupUserRequest;
use App\Models\User;
use CisConfig\Facades\Config;

class UserController extends Controller
{
    public function index() {
        return view('backend.users.index');
    }

    public function create() {
        $userAuthMethod = Config::get('user_auth_method');
        return view('backend.users.create',[
            'userAuthMethod' => $userAuthMethod,
        ]);
    }

    public function createGroupUser() {
        $userAuthMethod = Config::get('user_auth_method');
        return view('backend.groupuser.create',[
            'userAuthMethod' => $userAuthMethod,
        ]);
    }

    public function storeGroupUser(StoreGroupUserRequest $request) {
        $user = new User();
        $user->username = $request->get('username');
        $user->firstname = 'Group';
        $user->lastname = 'User';
        $user->group_user = 1;
        $user->email = 'group@user.de';
        $user->save();
        return redirect()->route("backend.users.show",$user);
    }

    public function edit(User $user) {
        $userAuthMethod = Config::get('user_auth_method');
        return view('backend.users.edit',[
            'user' => $user,
            'userAuthMethod' => $userAuthMethod,
        ]);
    }

    public function update(UpdateUserRequest $request,User $user) {
        $user->update($request->all());
        return redirect()->route("backend.users.show",$user);
    }

    public function store(StoreUserRequest $request) {
        $user = User::create($request->all());
        return redirect()->route("backend.users.show",$user);
    }

    public function show(User $user) {
        $userAuthMethod = Config::get('user_auth_method');
        return view("backend.users.show",[
            'user' => $user,
            'userAuthMethod' => $userAuthMethod,
        ]);
    }
}
