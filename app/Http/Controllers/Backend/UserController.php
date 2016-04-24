<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Backend\UserLoginRequest;
use App\Http\Requests\Backend\UserCreateRequest;
use App\Http\Requests\Backend\UserEditRequest;

class UserController extends BackendController
{
    public function login()
    {
        return view("backend.user.login");
    }

    public function doLogin(UserLoginRequest $request)
    {
        if(auth()->attempt([
            "username" => $request->get("username"),
            "password" => $request->get("password"),
            "is_admin" => true
        ], true))
            return redirect()->route("backend.dashboard.index")->with("success", trans("login.logged-in"));
        else
            return redirect()->route("backend.user.login")->withErrors(["username" => trans("login.failed")])->withInput();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route("backend.user.login")->with("success", trans("user.logged-out"));
    }

    public function index()
    {
        $users = User::latest()->paginate(25);
        return view("backend.user.index", [
            "users" => $users,
        ]);
    }

    public function create()
    {
        return view("backend.user.create");
    }

    public function store(UserCreateRequest $request)
    {
        $user = new User;
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->username = $request->get("username");
        $user->password = bcrypt($request->get("password"));
        $user->is_admin = $request->has("is_admin") && $request->get("is_admin") ? true : false;
        $user->save();

        return redirect()->route("backend.user.index")->with("success", "User successfully created!");
    }

    public function edit(User $user)
    {
        return view("backend.user.edit", [
            "user" => $user,
        ]);
    }

    public function update(UserEditRequest $request, User $user)
    {
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->username = $request->get("username");
        if($request->has("password"))
            $user->password = bcrypt($request->get("password"));
        $user->is_admin = $request->has("is_admin") && $request->get("is_admin") ? true : false;
        $user->save();

        return redirect()->route("backend.user.index")->with("success", "User successfully edited!");
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route("backend.user.index")->with("success", "User successfully deleted!");
    }
}
