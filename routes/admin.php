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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('/position')->name('position.')->group(function () {
        // Danh sách + thêm mới chức vụ
        Route::get('/', function () {
            return view('admin.pages.positions.index');
        })->name('home');

        // Sửa chức vụ
        Route::get('/edit-position', function () {
            return view('admin.pages.positions.edit_position');
        })->name('edit-position');

        // Thêm mới nhân viên
        Route::get('/create-employee', function () {
            return view('admin.pages.positions.create_employee');
        })->name('create-employee');

        // Danh sách nhân viên
        Route::get('/list-employee', function () {
            return view('admin.pages.positions.list_employee');
        })->name('list-employee');
    });

    Route::prefix("/major")->name("major.")->group(function () {
        // Danh sách + thêm mới chuyên môn
        Route::get('/', function () {
            return view('admin.pages.positions.major');
        })->name('home');

        // Sửa chuyên môn
        Route::get('/edit', function () {
            return view('admin.pages.positions.edit_major');
        })->name('edit-major');
    });

    Route::get('/dashboard', function () {
        return view('admin.pages.home.dashboard');
    })->name('dashboard');

    Route::get('/list-employees', function () {
        return view('admin.pages.home.list_employee');
    })->name('list-employee');

    Route::get('/list-user', function () {
        return view('admin.pages.home.users');
    })->name('users');
});
