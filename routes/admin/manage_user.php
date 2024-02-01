<?php

use App\Http\Controllers\Admin\ManageAccount\PasswordController;
use Illuminate\Support\Facades\Route;


Route::prefix('/account')->name('account.')->group(function () {
    // Hiển thị thông tin nhân viên
    Route::get('/', function () {
        return view('admin.pages.user.account_information');
    })->name('account');
    // Hiển thị thông tin tài khoản
    Route::get('/personal', function () {
        return view('admin.pages.user.personal_information');
    })->name('personal');
    // Tạo tài khoản
    Route::get('/create', function () {
        return view('admin.pages.user.create_account');
    })->name('create');
    // Edit
    Route::get('/edit', function () {
        return view('admin.pages.user.edit_account');
    })->name('edit');

    Route::get('/list', function () {
        return view('admin.pages.user.list_account');
    })->name('list');
    // Đổi mật khẩu
    Route::get('/change-password', [PasswordController::class, "ChangePassword"])->name('change-password');
    // Lưu thay đổi mật khẩu
    Route::post('/change-password', [PasswordController::class, "saveChangePassword"])->name('update-password');
});

