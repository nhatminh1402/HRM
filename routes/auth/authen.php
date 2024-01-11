<?php

use App\Http\Controllers\Captcha\CaptChaController;
use App\Http\Controllers\Employee\Auth\AuthenticateController;
use App\Http\Controllers\Employee\Auth\EmployeeAuthenticateController;
use App\Http\Middleware\Auth\PreventEmployeeLoginAgain;
use Illuminate\Support\Facades\Route;

Route::prefix('login')
    ->name('login.')
    ->group(function () {
        // Router login view
        Route::get('/', [AuthenticateController::class, 'index'])->name('index')->middleware(PreventEmployeeLoginAgain::class);

        // Router for submit form login
        Route::post('/', [AuthenticateController::class, 'login'])->name('submit');

        // Router capcha validate
        Route::post('/capcha-validate', [CaptChaController::class, 'validateCapchaCode'])->name('validateCapchaCode');

        // Router reload capcha code
        Route::get('/capcha-reload', [CaptChaController::class, 'capchaReload'])->name('capchaReload');
    });

// Router for employee logout
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
