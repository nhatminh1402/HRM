<?php

use App\Http\Controllers\Auth\CapChaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('login')
    ->name('login.')
    ->group(function () {
        // Router login
        Route::get('/', [LoginController::class, 'index'])->name("index");

        // Router validate data
        Route::post('/validate', [LoginController::class, 'validateData'])->name('validate');

        // Router capcha validate 
        Route::post('/capcha-validate', [CapChaController::class, 'validateCapchaCode'])->name('validateCapchaCode');
    });
