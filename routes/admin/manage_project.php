<?php

use App\Http\Controllers\Admin\PositionController;
use Illuminate\Support\Facades\Route;


Route::prefix('/project')->name('project.')->group(function () {
    // Danh sách + thêm mớ dự án
    Route::get('/', function(){
        return view('admin.pages.project.index');
    })->name('home');

     // Sửa dự án
     Route::get('/edit', function(){
        return view('admin.pages.project.edit_project');
    })->name('edit');
});
