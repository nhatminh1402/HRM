<?php

use App\Http\Controllers\Admin\PositionController;
use Illuminate\Support\Facades\Route;


Route::prefix('/discipline')->name('discipline.')->group(function () {
    // Danh sách + thêm mới chức vụ
    Route::get('/', function () {
        return view('admin.pages.discipline.index');
    })->name('index');

    // //Thêm mới chức vụ
    // Route::post('/', [PositionController::class, 'store'])->name('positions.store');

    // // Sửa chức vụ
    // Route::get('/edit-position/{id}', [PositionController::class, 'edit'])->name('edit-position');

    // Route::put('/update/{id}', [PositionController::class, 'update'])->name('positions.update');

    // // Danh sách + thêm mới chuyên ngành
    // Route::get('/major', function () {
    //     return view('admin.pages.employee_management.major');
    // })->name('major');

    // // Tìm kiêm danh sách chức vụ
    // Route::get('/search', [PositionController::class, 'index'])->name('search-position');

    // // Xóa chức vụ
    // Route::delete('/position/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
});
