<?php
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\TrashcanApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('trashcans', TrashcanApiController::class);
Route::apiResource('users', UserApiController::class);
