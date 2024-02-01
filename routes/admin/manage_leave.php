<?php

use App\Http\Controllers\User\leave\LeaveController;
use Illuminate\Support\Facades\Route;

// Phòng ban
Route::prefix('/leave')->name('leave.')->group(function () {
    Route::get('/',  [LeaveController::class, 'admingetleaves'])->name('list');
    Route::get('/detail/{id}',  [LeaveController::class, 'adminGetDetailLeave'])->name('detail');
    Route::get('accept/{id}', [LeaveController::class,'adminAcceptLeave'])->name('accept');
    Route::get('Non-accept/{id}', [LeaveController::class,'adminNonAcceptLeave'])->name('Non-accept');
});