<?php

use App\Http\Controllers\API\TimesheetController;
use App\Http\Controllers\API\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/districts", [LocationController::class, "getDistrictsByProvinceId"]);
Route::get("/wards", [LocationController::class, "getWardsByDistrcitId"]);
Route::post('/timesheet',[TimesheetController::class,'checkin']);

