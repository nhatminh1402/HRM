<?php

use App\Http\Controllers\Admin\DisciplineController;
use Illuminate\Support\Facades\Route;


Route::prefix('/discipline')->name('discipline.')->group(function () {
    // Danh sách + thêm mới  loại kỷ luật
    Route::get('/', [DisciplineController::class, 'index'])->name('home');

    //Thêm mới  loại kỷ luật
    Route::post('/', [DisciplineController::class, 'store'])->name('positions.store');

    // Sửa loại kỷ luật
    Route::get('/edit-discipline/{id}', [DisciplineController::class, 'edit'])->name('edit');

    Route::put('/update/{id}', [DisciplineController::class, 'update'])->name('update');

    // Xóa loại lỷ luật
    Route::delete('/discipline/{id}', [DisciplineController::class, 'destroy'])->name('destroy');

    //Tìm kiếm loại kry luật
    Route::get('/search', [DisciplineController::class, 'index'])->name('search');



});
