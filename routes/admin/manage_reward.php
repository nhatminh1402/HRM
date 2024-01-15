<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/reward')->name('reward.')->group(function () {
    // Hiển thị view khen thưởng

    Route::get('/', function () {
        return view("admin.pages.reward.ManageReward");
    })->name('index');
});
