<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormLoginRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function validateData(FormLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isAdmin) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('user.home');
            }
        }

        return redirect()
            ->route('login.index')
            ->with('error', 'ĐĂNG NHẬP THẤT BẠI!');
    }
}
