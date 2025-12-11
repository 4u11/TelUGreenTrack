<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;

Route::resource('schedules', ScheduleController::class);