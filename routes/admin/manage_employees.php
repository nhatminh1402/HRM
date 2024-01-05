<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/employees')->name('position.')->group(function () {
    // Thêm mới nhân viên
    Route::get('/create', function () {
        return view('admin.pages.positions.create_employee');
    })->name('create-employee');

    // Danh sách nhân viên
    Route::get('/lists', function () {
        return view('admin.pages.positions.list_employee');
    })->name('list-employee');
});
