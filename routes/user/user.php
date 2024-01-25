<?php

use App\Http\Controllers\User\Timeline\TimelineController;
use App\Http\Controllers\User\Timesheet\TimesheetController;
use App\Http\Controllers\User\Detail\UserUploadImgController;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Detail\UserDetailController;
use App\Http\Controllers\User\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 1. Router cho trang Home
Route::get('home-page', function () {
    return view('user.pages.index');
})->name('home');

// 2. Router cho trang xem thông tin chi tiết nhân viên
Route::get('employee-infor', [UserDetailController::class, 'getEmployeeInfor'])->name('employee-info');

// 3. Router cho trang xem các phòng ban
Route::get('departments', function () {
    return view('user.pages.manage_department');
})->name('departments');

// 4. Router cho trang xem danh sách nhân viên của phòng ban
Route::get('department-detail', function () {
    return view('user.pages.department_detail');
})->name('department-detail');

// 5. Router cho trang xem bảng lương cá nhân
Route::get('salary', function () {
    return view('user.pages.manage_salary');
})->name('salary');

// 6. Router cho trang xem danh sách công tác
Route::get('schedule', function () {
    return view('user.pages.manage_business_travel');
})->name('schedule');

//7. Router cho trang xem danh sách khen thưởng
Route::get('reward', function () {
    return view('user.pages.list_reward');
})->name('reward');

//8. Router cho trang xem lịch sử bị kỷ luật
Route::get('punishments', function () {
    return view('user.pages.list_punishment');
})->name('punishments');

//9. Router cho trang xem thông tin tài khoản
Route::get('infors', function () {
    return view('user.pages.user_infors');
})->name('infors');

//10. Router cho view đổi mật khẩu
Route::get('change-password', [PasswordController::class, 'showViewChangePassword'])->name('view-change-password');

//11. Router đổi mật khẩu
Route::post('change-password', [PasswordController::class, 'changePassword'])->name('change-password');

//12. Router cho trang hiển thị timesheet
Route::get('timesheet-user', [TimesheetController::class, 'showtimesheet'])->name('timesheet-user');

//13. Router cho trang xem timeline nhân viên
Route::get('timeline', [TimelineController::class, 'index'])->name('timeline');

//14. Router cho trang hiển thị ảnh train model
Route::group(['prefix' => 'images'], function () {
    Route::get('/', [UserUploadImgController::class, 'index'])->name('images');
    Route::post('/upload', [UserUploadImgController::class, 'upload'])->name('dropzone.upload');
    Route::get('/fetch', [UserUploadImgController::class, 'fetch'])->name('dropzone.fetch');
    Route::get('/delete', [UserUploadImgController::class, 'delete'])->name('dropzone.delete');
});
