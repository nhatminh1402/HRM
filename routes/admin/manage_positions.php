<?php

use App\Http\Controllers\Admin\PositionController;
use Illuminate\Support\Facades\Route;


Route::prefix('/position')->name('position.')->group(function () {
    // Danh sách + thêm mới chức vụ
    Route::get('/', [PositionController::class, 'index'])->name('home');
    //Thêm mới chức vụ
    Route::post('/create', [PositionController::class, 'store'])->name('store');
    // Sửa chức vụ
    Route::get('/edit', [PositionController::class, 'edit'])->name('edit');
    Route::put('/update', [PositionController::class, 'update'])->name('update');
    //Tìm kiêm danh sách chức vụ
    Route::get('/search', [PositionController::class, 'index'])->name('search-position');
    // Xóa chức vụ
    Route::delete('/position/{id}', [PositionController::class, 'destroy'])->name('destroy');
});
