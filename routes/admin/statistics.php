<?php

use App\Http\Controllers\Statistics\StatisticsController;
use Illuminate\Support\Facades\Route;


Route::prefix('/statistics')->name('statistics.')->group(function () {
    // Thống kê sự thay đổi số lượng nhân viên theo từng tháng trong năm
    Route::get('/employees', [StatisticsController::class, 'countEmployeeChangesByMonth'])->name('employees');
    //Thống kê tổng số lượng nhân viên theo từng phòng ban
    Route::get('/EmployeeEachDepartment', [StatisticsController::class, 'countEmployeeInEachDepartment'])->name('EmployeeEachDepartment');
    //Thống kê tổng số lượng nhân viên theo từng project
    Route::get('/EmployeeEachProject', [StatisticsController::class, 'countEmployeeInEachProject'])->name('EmployeeEachProject');
});

