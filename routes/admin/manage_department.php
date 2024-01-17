<?php

use App\Http\Controllers\Department\DepartmentController;
use Illuminate\Support\Facades\Route;

// Phòng ban
Route::prefix('/department')->name('department.')->group(function () {
    Route::get('/show_department', [DepartmentController::class, 'showallBlockDeparment'])->name('show');
    Route::get('/add_department',  [DepartmentController::class, 'showallDeparment'])->name('add');
    Route::post('/add_department', [DepartmentController::class, 'addDepartment'])->name('post_add');
    Route::get('/department/{id}', [DepartmentController::class, 'getDetailDepartment'])->name('detail');
    Route::put('/department/update/{id}',[DepartmentController::class,'updateDepartment'])->name('update');
    Route::delete('/department/delete/{id}',[DepartmentController::class, 'destroyDepartment'])->name('delete');
    Route::get('/department/delete/employee/{id}',[DepartmentController::class,'destroyEmployeeDepartment'])->name('deleteEmployee');
});
