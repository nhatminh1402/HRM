
<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/salary')->name('salary.')->group(function(){
        Route::get('/show_salary',function(){
            return view('admin.pages.salary.show-salary');
        })->name('show');
        Route::get('/cal_salary', function(){
            return view('admin.pages.salary.cal-salary');
        })->name('calculator');
    });
