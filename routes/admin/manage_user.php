<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/account')->name('account.')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.user.account_information');
    })->name('account');
    Route::get('/personal', function () {
        return view('admin.pages.user.personal_information');
    })->name('personal');
});
