<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashcanController;
use App\Http\Controllers\Admin\EmissionController;


// 1. Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Dashboard (OPEN TO EVERYONE)
//removed ->middleware(['auth']) so it won't ask for a login
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 3. User Views (Public Information Dashboard)
Route::get('/user-views', function () {
    return view('user-views');
})->name('user.views');

// Public access

// Miftahul
Route::resource('schedules', ScheduleController::class);

// Kinan
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('emissions', EmissionController::class);
});

// Delon 
Route::get('/trashcans-ui', function () {
    return view('trashcans.index');
});

Route::get('/users-ui', function () {
    return view('users.index');
});