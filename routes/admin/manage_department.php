<?php

use Illuminate\Support\Facades\Route;

 // Phòng ban
 Route::prefix('/department')->name('department.')->group(function () {
    Route::get('/add_department', function () {
        return view('admin.pages.department.add-department');
    })->name('add_department');
    Route::get('/department', function () {
        return view('admin.pages.department.manage-department');
    })->name('manage_department');
    Route::get('/show_department', function () {
        return view('admin.pages.department.show-department');
    })->name('show_department');
});
