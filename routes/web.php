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

// __DIR__ : in ra đường dẫn đầy đủ của thư mục chứa file hiện tại
// glob(): hàm tìm kiếm tất cả các đường dẫn theo theo pattern truyền vào
$listRouteAdminFile = glob(__DIR__ . '/admin/*.php');
$listRouteUserFile = glob(__DIR__ . '/user/*.php');

// Router cho admin
foreach ($listRouteAdminFile as $routeFile) {
    require $routeFile;
}

// Router cho User
foreach ($listRouteUserFile as $routeFile) {
    require $routeFile;
}

Route::get('/', function () {
    return view('admin.pages.home.dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.pages.home.dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
