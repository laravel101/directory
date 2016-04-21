<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Backend\UserLoginRequest;

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
}
