<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Admin\EmissionController;

Route::resource('schedules', ScheduleController::class);

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('emissions', EmissionController::class);
});