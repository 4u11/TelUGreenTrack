<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ScheduleApiController;
use App\Http\Controllers\Api\TrashcanApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\EmissionAPIController;
/*
|--------------------------------------------------------------------------
| API Routes - PUBLIC DEMO VERSION
|--------------------------------------------------------------------------
*/

//Removed authentication for demo purposes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('users', UserApiController::class);
    Route::apiResource('trashcans', TrashcanApiController::class);
    Route::apiResource('emissions', EmissionAPIController::class);
});