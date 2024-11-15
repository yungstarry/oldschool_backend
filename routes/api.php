<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//get all schools
Route::get('/schools-names', [SchoolController::class, 'getSchoolNames']);

//store school
Route::post('/schools', [SchoolController::class, 'store']);




Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
});