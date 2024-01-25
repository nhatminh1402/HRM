<?php

use App\Http\Controllers\Employee\CreateEmployeeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\UpdateEmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/employees')
    ->name('employee.')
    ->group(function () {
        // Hiển thị form thêm mới nhân viên
        Route::get('/create', [CreateEmployeeController::class, 'create'])->name('create-employee');
        // Thêm mới nhân viên
        Route::post('/store', [CreateEmployeeController::class, 'store'])->name('store-employee');
        // Danh sách nhân viên
        Route::get('/lists', [EmployeeController::class, 'showallemployee'])->name('list-employee');
        // Xem chi tiết nhân viên
        Route::get('/detail/{id}', [EmployeeController::class, 'getDetailEmployee'])->name('detail-employee');
        // Tìm kiếm nhân viên
        Route::get('/lists/search', [EmployeeController::class, 'searchEmploy'])->name('search-employee');
        // Form edit nhân viên
        Route::get('/edit/{id}', [UpdateEmployeeController::class, 'showViewUpdate'])->name('form-edit');
        // Lưu thông tin chỉnh sửa
        Route::post('/update/{id}', [UpdateEmployeeController::class, 'update'])->name('update');
        // Xuất file execl thông tin nhân viên
        Route::get('/export', [EmployeeController::class, 'export'])->name('export');
    });
