<?php

use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;


Route::prefix('/project')->name('project.')->group(function () {
    // Danh sách + thêm mới dự án
    Route::get('/', [ProjectController::class, 'index'])->name('home');
    //Thêm mới dự án
    Route::post('/create', [ProjectController::class, 'store'])->name('store');
    // Sửa chức dự án
    Route::get('/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::put('/update', [ProjectController::class, 'update'])->name('update');
    // Xóa dự án
    Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('destroy');
    //Tìm kiếm dự án
    Route::get('/search', [ProjectController::class, 'index'])->name('search');
});
