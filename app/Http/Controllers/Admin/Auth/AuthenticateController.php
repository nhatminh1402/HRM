<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function index()
    {
        return view("admin.pages.authentication.login");
    }

    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route("admin.dashboard")->with("success", "ĐĂNG NHẬP THÀNH CÔNG");
        }

        return redirect()
            ->back()
            ->withInput($credentials)
            ->with('error', 'ĐĂNG NHẬP THẤT BẠI!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}
