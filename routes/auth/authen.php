<?php

use App\Http\Controllers\Auth\CapChaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Middleware\Auth\PreventLoginAgain;
use Illuminate\Support\Facades\Route;

Route::prefix('login')
    ->name('login.')
    ->middleware(PreventLoginAgain::class)
    ->group(function () {
        // Router login
        Route::get('/', [LoginController::class, 'index'])->name('index');

        // Router validate data
        Route::post('/validate', [LoginController::class, 'validateData'])->name('validate');

        // Router capcha validate
        Route::post('/capcha-validate', [CapChaController::class, 'validateCapchaCode'])->name('validateCapchaCode');

        // Router reload capcha code
        Route::get('/capcha-reload', [CapChaController::class, 'capchaReload'])->name('capchaReload');
    });

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
