<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashcanController;
use App\Http\Controllers\Admin\EmissionController;

Route::resource('schedules', ScheduleController::class);
Route::get('/', function () {return view('welcome'); });
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); });
Route::get('/trashcans-ui', function () { return view('trashcans.index'); });
Route::get('/users-ui', function () { return view('users.index'); });
Route::get('/admin-dashboard', function () {return view('admin.dashboard');});
Route::get('/regular-dashboard', function () {return view('regular.dashboard');});

Route::get('/user-dashboard', function () { return view('user_dashboard'); });
Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('emissions', EmissionController::class);
});
