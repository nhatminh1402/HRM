<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/position')->name('employee.')->group(function () {
    // Danh sách + thêm mới chức vụ
    Route::get('/', function () {
        return view('admin.pages.employee_management.index');
    })->name('home');

    // Sửa chức vụ
    Route::get('/edit-position', function () {
        return view('admin.pages.employee_management.edit_position');
    })->name('edit-position');

    // Danh sách + thêm mới chức vụ
    Route::get('/major', function () {
        return view('admin.pages.employee_management.major');
    })->name('major');
});
