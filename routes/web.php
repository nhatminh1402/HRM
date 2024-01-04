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
Route::prefix('admin')->group(function () {
    Route::prefix('/position')->group(function () {
        // Danh sách + thêm mới chwcs vụ
        Route::get('/home', function () {
            return view('admin.pages.positions.index');
        });
        //Sửa chức vụ
        Route::get('/edit_position', function () {
            return view('admin.pages.positions.edit_position');
        });
        // Danh sách + thêm mới chuyên môn
        Route::get('/major', function () {
            return view('admin.pages.positions.major');
        });
        // Sửa chuyên môn
        Route::get('/edit_major', function () {
            return view('admin.pages.positions.edit_major');
        });
        // thêm mới nhân viên
        Route::get('/create_employee', function () {
            return view('admin.pages.positions.create_employee');
        });
        // danh sách nhân viên
        Route::get('/list_employee', function () {
            return view('admin.pages.positions.list_employee');
        });
    });
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
