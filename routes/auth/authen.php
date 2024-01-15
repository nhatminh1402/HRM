<?php

use App\Http\Controllers\Captcha\CaptChaController;
use App\Http\Controllers\Employee\Auth\AuthenticateController;
use App\Http\Middleware\Auth\PreventEmployeeLoginAgain;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticateController as AdminAuthenticate;
use App\Http\Middleware\Auth\PreventAdminLoginAgain;

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

Route::prefix('admin/login')
    ->name('admin.login.')
    ->group(function () {
        // Router login view
        Route::get('/', [AdminAuthenticate::class, 'index'])->name('index')->middleware(PreventAdminLoginAgain::class);

        // Router for submit form login
        Route::post('/', [AdminAuthenticate::class, 'login'])->name('submit');

        // Router capcha validate
        Route::post('/capcha-validate', [CaptChaController::class, 'validateCapchaCode'])->name('validateCapchaCode');
    });

// Router for employee logout
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
// Router for admin logout
Route::get('admin/logout', [AdminAuthenticate::class, 'logout'])->name('admin.logout');
