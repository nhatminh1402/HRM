<?php

use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;


Route::prefix('/project')->name('project.')->group(function () {
   // Danh sách + thêm mới chức vụ
   Route::get('/', [ProjectController::class, 'index'])->name('home');

   //Thêm mới chức vụ
   Route::post('/create', [ProjectController::class, 'store'])->name('store');

});
