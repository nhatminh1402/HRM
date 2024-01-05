<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('/position')->name('position.')->group(function () {
        // Danh sách + thêm mới chức vụ
        Route::get('/', function () {
            return view('admin.pages.positions.index');
        })->name('home');

        // Sửa chức vụ
        Route::get('/edit-position', function () {
            return view('admin.pages.positions.edit_position');
        })->name('edit-position');
    });
});
