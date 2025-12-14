<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashcanController;

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
Route::get('/', function () {
    return view('welcome'); // Home page
});

// Route to show the Trashcan Management Page
Route::get('/trashcans-ui', function () {
    return view('trashcans.index'); // We will create this view next
});

// Route to show the User Management Page
Route::get('/users-ui', function () {
    return view('users.index');
});
use App\Http\Controllers\Admin\EmissionController;

Route::resource('schedules', ScheduleController::class);

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('emissions', EmissionController::class);
});
