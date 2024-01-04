<?php

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

Route::get('/', function () {
    return view('layouts.admin.base');
});

//===================Router cho User==========================
// 1. Router cho trang Home
Route::get("HomePage", function () {
    return view("user.index");
});

//2. Router cho trang xem thông tin chi tiết nhân viên
Route::get("EmployeeInfor", function () {
    return view("user.employeeInfor");
});

//3. Router cho trang xem các phòng ban
Route::get("Departments", function () {
    return view("user.ManageDepartment");
});

//4. Router cho trang xem danh sách nhân viên của phòng ban
Route::get("DepartmentDetail", function () {
    return view("user.DepartmentDetail");
});

//4. Router cho trang xem bảng lương cá nhân
Route::get("Salary", function () {
    return view("user.ManageSalary");
});
