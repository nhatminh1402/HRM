<?php

use App\Http\Controllers\Admin\ManageReward\ManageRewardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/reward')
    ->name('reward.')
    ->group(function () {
        // Hiển thị view khen thưởng
        Route::get('/', [ManageRewardController::class, 'create'])->name('index');
        // Thêm mới loại khen thưởng
        Route::post('/store', [ManageRewardController::class, 'store'])->name('store');
        // Xóa loại khen thưởng
        Route::post('/delete/{id}', [ManageRewardController::class, 'delete'])->name('delete');
        // Form update
        Route::get('/edit/{id}', [ManageRewardController::class, 'edit'])->name('edit');
        // Update
        Route::post('/update/{id}', [ManageRewardController::class, 'update'])->name('update');
        // Tìm kiếm loại khen thưởng theo id
        Route::get('/find/{id}', [ManageRewardController::class, 'find'])->name('find');
    });
