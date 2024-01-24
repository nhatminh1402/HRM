
<?php

use App\Http\Controllers\Admin\SalaryController;
use Illuminate\Support\Facades\Route;


Route::prefix('/salary')->name('salary.')->group(function(){
        Route::get('/show_salary',[SalaryController::class, 'index'])->name('index');

        Route::get('/create',[SalaryController::class, 'create'])->name('create');

        Route::post('/store', [SalaryController::class, 'store'])->name('store');

        Route::get('/detail_salary',function(){
            return view('admin.pages.salary.detail-salary');
        })->name('detail');
    });
