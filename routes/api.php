<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\TrashcanApiController;
use App\Http\Controllers\Api\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes - PUBLIC DEMO VERSION
|--------------------------------------------------------------------------
*/

//Removed authentication for demo purposes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('trashcans', TrashcanApiController::class);
Route::apiResource('users', UserApiController::class);