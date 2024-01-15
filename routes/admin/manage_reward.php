<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/reward')->name('reward.')->group(function () {
    // Trang chủ
    // Route::get('/', [PositionController::class, 'index'])->name('home');

    // Danh sách + thêm mới chức vụ
    Route::get('/', function () {
        return view("admin.pages.reward.ManageReward");
    })->name('index');
});
