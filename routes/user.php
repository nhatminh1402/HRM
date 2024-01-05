<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('user')->name("user.")->group(function () {
    // 1. Router cho trang Home
    Route::get("home-page", function () {
        return view("user.pages.index");
    })->name('home');

    // 2. Router cho trang xem thông tin chi tiết nhân viên
    Route::get("employee-infor", function () {
        return view("user.pages.employee_infor");
    })->name('employee-info');

    // 3. Router cho trang xem các phòng ban
    Route::get("departments", function () {
        return view("user.pages.manage_department");
    })->name('departments');

    // 4. Router cho trang xem danh sách nhân viên của phòng ban
    Route::get("department-detail", function () {
        return view("user.pages.department_detail");
    })->name('department-detail');

    // 5. Router cho trang xem bảng lương cá nhân
    Route::get("salary", function () {
        return view("user.pages.manage_salary");
    })->name('salary');

    // 6. Router cho trang xem danh sách công tác
    Route::get("schedule", function () {
        return view("user.pages.manage_business_travel");
    })->name('schedule');

    //7. Router cho trang xem danh sách khen thưởng
    Route::get("reward", function () {
        return view("user.pages.list_reward");
    })->name("reward");

    //8. Router cho trang xem lịch sử bị kỷ luật
    Route::get("punishments", function () {
        return view("user.pages.list_punishment");
    })->name("punishments");

    //9. Router cho trang xem thông tin tài khoản
    Route::get("infors", function () {
        return view("user.pages.user_infors");
    })->name("infors");

    //10. Router cho trang đổi mật khẩu
    Route::get("change-password", function () {
        return view("user.pages.change_password");
    })->name("change-password");
});
