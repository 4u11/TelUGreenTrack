<?php
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::apiResource('schedules', ScheduleController::class);