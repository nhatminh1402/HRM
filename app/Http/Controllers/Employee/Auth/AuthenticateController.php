<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmployeeLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    protected $guard = 'user';

    public function index()
    {
        return view("user.pages.login");
    }

    public function login(EmployeeLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('employee')->attempt($credentials)) {
            return redirect()->route("user.home")->with("success", "ĐĂNG NHẬP THÀNH CÔNG");
        }

        return redirect()
            ->back()
            ->withInput($credentials)
            ->with('error', 'ĐĂNG NHẬP THẤT BẠI!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
