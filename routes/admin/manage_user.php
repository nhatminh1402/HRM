<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/account')->name('account.')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.user.account_information');
    })->name('account');
    Route::get('/personal', function () {
        return view('admin.pages.user.personal_information');
    })->name('personal');
    Route::get('/create', function () {
        return view('admin.pages.user.create_account');
    })->name('create');
    Route::get('/edit', function () {
        return view('admin.pages.user.edit_account');
    })->name('edit');
    Route::get('/list', function () {
        return view('admin.pages.user.list_account');
    })->name('list');
    Route::get('/change-password', function () {
        return view('admin.pages.user.change_password');
    })->name('change-password');
});

