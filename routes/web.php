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
// Router cho admin
Route::prefix('admin')->name('admin.')->group(function () {

    $listRouteAdminFile = glob(__DIR__ . '/admin/*.php');

    foreach ($listRouteAdminFile as $routeFile) {
        require $routeFile;
    }
});
// Router cho User
Route::prefix('user')->name("user.")->group(function () {

    $listRouteUserFile = glob(__DIR__ . '/user/*.php');

    foreach ($listRouteUserFile as $routeFile) {
        require $routeFile;
    }
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
Route::get('/dashboard', function () {
    return view('admin.pages.home.dashboard');
})->name('dashboard');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
