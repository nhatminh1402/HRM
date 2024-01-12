<?php

namespace App\Http\Controllers\Captcha;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CapChaFormRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CaptChaController extends Controller
{
    public function validateCapchaCode(CapChaFormRequest $request)
    {
        session()->forget('numberLoginFailed');

        return redirect()->route('login.index');
    }

    public function capchaReload()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }
}
