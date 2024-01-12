<?php

use App\Http\Controllers\EmployeeController\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::prefix('/employees')->name('employee.')->group(function () {
    Route::get('/create', function () {
        return view('admin.pages.employee_management.create_employee');
    })->name('create-employee');

    Route::get('/add', function () {
        return view('admin.pages.employee_management.add_employee');
    })->name('add-employee');

    // Danh sách nhân viên
    Route::get('/lists', function () {
        return view('admin.pages.employee_management.list_employee');
    })->name('list-employee');
    Route::get('/lists', [EmployeeController::class, 'showallemployee'])->name('list-employee');
    Route::get('/detail/{id}', [EmployeeController::class, 'getDetailEmployee'])->name('detail-employee');
    Route::get('/lists/search', [EmployeeController::class, 'searchEmploy'])->name('search-employee');
});
