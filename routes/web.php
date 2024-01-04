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
    return view('admin.positions.index');
});

Route::prefix('user')->group(function () {
    // 1. Router cho trang Home
    Route::get("HomePage", function () {
        return view("user.pages.index");
    });

    //2. Router cho trang xem thông tin chi tiết nhân viên
    Route::get("EmployeeInfor", function () {
        return view("user.pages.employee_infor");
    });

    //3. Router cho trang xem các phòng ban
    Route::get("Departments", function () {
        return view("user.pages.manage_department");
    });

    //4. Router cho trang xem danh sách nhân viên của phòng ban
    Route::get("DepartmentDetail", function () {
        return view("user.pages.department_detail");
    });

    //5. Router cho trang xem bảng lương cá nhân
    Route::get("Salary", function () {
        return view("user.pages.manage_salary");
    });

    //6. Router cho trang xem danh sách công tác    
    Route::get("Schedule", function () {
        return view("user.pages.manage_business_travel");
    });

    //7. Router cho trang xem danh sách khen thưởng
    Route::get("reward", function () {
        return view("user.pages.list_reward");
    });
});

Route::get('/admin/position', function () {
    return view('admin.positions.index');
});

Route::get('/admin/edit', function () {
    return view('admin.positions.edit_position');
});


Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/listemployes', function () {
    return view('admin.listemployes');
});

Route::get('/user', function () {
    return view('admin.users');
});
