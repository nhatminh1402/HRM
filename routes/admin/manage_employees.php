<?php

use App\Http\Controllers\EmployeeController\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::prefix('/employees')->name('employee.')->group(function () {
    Route::get('/create', function () {
        return view('admin.pages.employee_management.create_employee');
    })->name('create-employee');

    Route::get('/lists', [EmployeeController::class, 'showAllUser'])->name('list-employee');
});
