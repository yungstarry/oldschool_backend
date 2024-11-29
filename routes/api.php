<?php

use App\Http\Controllers\AssociationController;
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
//check association
Route::post('/check-association', [AssociationController::class, 'checkAssociation']);





Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/association-members', [AssociationController::class, 'getAssociationMembers']);

    
});

Route::middleware('auth:sanctum', 'role:admin')->group(function () {
    Route::post('/assign-admin', [AuthController::class, 'assignAdmin']);
    Route::get('/association', [AssociationController::class, 'index']);
});

Route::middleware('auth:sanctum', 'role:admin')->group(function () {
    Route::post('/association', [AssociationController::class, 'store']);
});
