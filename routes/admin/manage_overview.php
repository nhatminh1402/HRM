<?php

use Illuminate\Support\Facades\Route;

//Tổng quan
Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    // Danh sách tài khoản
    Route::get('/account', function () {
        return view('admin.pages.home.users');
    })->name('account');

    // Danh sách nhân viên
    Route::get('/employee', function () {
        return view('admin.pages.home.list_employee');
    })->name('employee');
});
