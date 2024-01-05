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

Route::prefix('user')->name("user.")->group(function () {
    // 1. Router cho trang Home
    Route::get("home-page", function () {
        return view("user.pages.index");
    })->name('home');
    // 2. Router cho trang xem thông tin chi tiết nhân viên
    Route::get("employee-infor", function () {
        return view("user.pages.employee_infor");
    })->name('employee-info');
    // 3. Router cho trang xem các phòng ban
    Route::get("departments", function () {
        return view("user.pages.manage_department");
    })->name('departments');
    // 4. Router cho trang xem danh sách nhân viên của phòng ban
    Route::get("department-detail", function () {
        return view("user.pages.department_detail");
    })->name('department-detail');
    // 5. Router cho trang xem bảng lương cá nhân
    Route::get("salary", function () {
        return view("user.pages.manage_salary");
    })->name('salary');
    // 6. Router cho trang xem danh sách công tác
    Route::get("schedule", function () {
        return view("user.pages.manage_business_travel");
    })->name('schedule');

    //7. Router cho trang xem danh sách khen thưởng
    Route::get("reward", function () {
        return view("user.pages.list_reward");
    })->name("reward");

    //8. Router cho trang xem lịch sử bị kỷ luật
    Route::get("punishments", function () {
        return view("user.pages.list_punishment");
    })->name("punishments");

    //9. Router cho trang xem thông tin tài khoản
    Route::get("infors", function () {
        return view("user.pages.user_infors");
    })->name("infors");

    //10. Router cho trang đổi mật khẩu
    Route::get("change-password", function () {
        return view("user.pages.change_password");
    })->name("change-password");

    //11. Router cho trang login
    Route::get("login", function () {
        return view("user.pages.login");
    })->name("login");
});

Route::get('/admin/position', function () {
    return view('admin.positions.index');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('/position')->name('position.')->group(function () {
        // Danh sách + thêm mới chức vụ
        Route::get('/home', function () {
            return view('admin.pages.positions.index');
        })->name('home');
        // Sửa chức vụ
        Route::get('/edit-position', function () {
            return view('admin.pages.positions.edit_position');
        })->name('edit-position');
        // Danh sách + thêm mới chuyên môn
        Route::get('/major', function () {
            return view('admin.pages.positions.major');
        })->name('major');
        // Sửa chuyên môn
        Route::get('/edit-major', function () {
            return view('admin.pages.positions.edit_major');
        })->name('edit-major');
        // Thêm mới nhân viên
        Route::get('/create-employee', function () {
            return view('admin.pages.positions.create_employee');
        })->name('create-employee');
        // Danh sách nhân viên
        Route::get('/list-employee', function () {
            return view('admin.pages.positions.list_employee');
        })->name('list-employee');
    });
    // Phòng ban
    Route::prefix('/department')->name('department.')->group(function () {
        Route::get('/add_department', function () {
            return view('admin.pages.department.add-department');
        })->name('add_department');
        Route::get('/department', function () {
            return view('admin.pages.department.manage-department');
        })->name('manage_department');
        Route::get('/show_department', function () {
            return view('admin.pages.department.show-department');
        })->name('show_department');
    });

    Route::prefix('/salary')->name('salary.')->group(function(){
        Route::get('/show_salary',function(){
            return view('admin.pages.salary.salary');
        })->name('show-salary');
        Route::get('/cal_salary', function(){
            return view('admin.pages.salary.cal-salary');
        })->name('cal-salary');
    });
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/dashboard', function () {
    return view('admin.pages.home.dashboard');
});
Route::get('/listemployes', function () {
    return view('admin.listemployes');
});
Route::get('/user', function () {
    return view('admin.users');
});
