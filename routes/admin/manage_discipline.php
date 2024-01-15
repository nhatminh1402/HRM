<?php

use App\Http\Controllers\Admin\PositionController;
use Illuminate\Support\Facades\Route;


Route::prefix('/discipline')->name('discipline.')->group(function () {
    // Danh sách + thêm mới chức vụ
    Route::get('/', function () {
        return view('admin.pages.discipline.index');
    })->name('index');
});
