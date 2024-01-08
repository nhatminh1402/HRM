<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\Auth\CheckAdmin;
use App\Http\Middleware\Auth\CheckUser;
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

// Router cho admin
Route::prefix('admin')
    ->name('admin.')
    ->middleware(CheckAdmin::class)
    ->group(function () {
        $listRouteAdminFile = glob(__DIR__ . '/admin/*.php');
        foreach ($listRouteAdminFile as $routeFile) {
            require $routeFile;
        }
    });

// Router cho User
Route::prefix('user')
    ->name('user.')
    ->middleware(CheckUser::class)
    ->group(function () {
        $listRouteUserFile = glob(__DIR__ . '/user/*.php');

        foreach ($listRouteUserFile as $routeFile) {
            require $routeFile;
        }
    });

// Router xác thực tài khoản người dùng
$listRouteAuthFile = glob(__DIR__ . '/auth/*.php');

foreach ($listRouteAuthFile as $routeFile) {
    require $routeFile;
}

//
Route::get('/', function () {
    return view('admin.pages.home.dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.pages.home.dashboard');
})->name('dashboard');
