<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;

//Landing page
Route::get('/', function () {
    return view('welcome');
});

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'. 'verified'])->name('dashboard');


//schedule "protected"
Route::middleware('auth')->group(function () {
Route::resource('schedules', ScheduleController::class);});