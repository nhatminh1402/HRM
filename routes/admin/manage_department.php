<?php

use App\Http\Controllers\Department\DepartmentController;
use Illuminate\Support\Facades\Route;

// Phòng ban
Route::prefix('/department')->name('department.')->group(function () {
    Route::get('/', [DepartmentController::class, 'showallDeparment'])->name('add');
    Route::post('/add_department', [DepartmentController::class, 'addDepartment'])->name('post_add');
    Route::get('/department/{id}', [DepartmentController::class, 'getDetailDepartment']);
    Route::get('/employee/{id}', [DepartmentController::class, 'getEmployeeDepartment'])->name('detail');
    Route::get('/employee/search/{id}', [DepartmentController::class, 'getEmployeeDepartment'])->name('search-employee');
    Route::post('/employee/add/{id}', [DepartmentController::class, 'addEmployeeDepartment'])->name('addEmployee');
    Route::put('/department/update/{id}', [DepartmentController::class, 'updateDepartment'])->name('update');
    Route::delete('/department/delete/{id}', [DepartmentController::class, 'destroyDepartment'])->name('delete');
    Route::get('/department/delete/employee/{id}', [DepartmentController::class, 'destroyEmployeeDepartment'])->name('deleteEmployee');
    Route::get('/search', [DepartmentController::class, 'showallDeparment'])->name('search-department');
});
