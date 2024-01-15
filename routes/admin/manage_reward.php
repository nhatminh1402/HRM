<?php

use App\Http\Controllers\Admin\ManageReward\ManageRewardController;
use Illuminate\Support\Facades\Route;


Route::prefix('/reward')->name('reward.')->group(function () {
    // Hiển thị view khen thưởng
    Route::get('/', [ManageRewardController::class, "create"])->name('index');
});
