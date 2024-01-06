<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CapChaController extends Controller
{
    public function validateCapchaCode(Request $request)
    {
        $message = [
            'captcha.required' => 'Vui lòng xác minnh để tiếp tục đăng nhập',
            'captcha.captcha' => 'Xác minh thất bại!',
        ];

        $request->validate(
            [
                'captcha' => 'required|captcha',
            ],
            $message,
        );
        
        session()->forget('numberLoginFailed');

        return redirect()->route('login.index');
    }
}
