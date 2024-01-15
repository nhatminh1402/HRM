<?php

use App\Http\Controllers\Admin\DisciplineController;
use Illuminate\Support\Facades\Route;


Route::prefix('/discipline')->name('discipline.')->group(function () {
    // Danh sách + thêm mới chức vụ
    Route::get('/', [DisciplineController::class, 'index'])->name('home');

    //Thêm mới chức vụ
    Route::post('/', [DisciplineController::class, 'store'])->name('positions.store');

    // Sửa chức vụ
    Route::get('/edit-discipline/{id}', [DisciplineController::class, 'edit'])->name('edit');

    Route::put('/update/{id}', [DisciplineController::class, 'update'])->name('update');


});
