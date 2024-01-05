<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix("/major")->name("major.")->group(function () {
        // Danh sách + thêm mới chuyên môn
        Route::get('/', function () {
            return view('admin.pages.positions.major');
        })->name('home');

        // Sửa chuyên môn
        Route::get('/edit', function () {
            return view('admin.pages.positions.edit_major');
        })->name('edit-major');
    });
});
