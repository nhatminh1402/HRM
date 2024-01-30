<?php

use App\Http\Controllers\Statistics\StatisticsController;
use Illuminate\Support\Facades\Route;


Route::prefix('/statistics')->name('statistics.')->group(function () {
    Route::get('/employees', [StatisticsController::class, 'countEmployeeChangesByMonth'])->name('employees');
});

