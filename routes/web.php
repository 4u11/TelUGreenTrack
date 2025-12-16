<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashcanController;
use App\Http\Controllers\Admin\EmissionController;
use App\Models\Schedule; 
use App\Models\Trashcan; 
use App\Models\Emission;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes - PUBLIC DEMO VERSION
|--------------------------------------------------------------------------
*/

// --- Halaman Depan ---
Route::get('/', function () {
    return view('welcome');
});

// --- Dashboard Routes ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/regular-dashboard', function () {
    return view('regular.dashboard');
});

// --- Auth Views 
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); });

// --- SCHEDULES CRUD
Route::resource('schedules', ScheduleController::class);

// --- Admin Routes ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('emissions', EmissionController::class);
});

// --- User Views (Mockup/UI Only) ---
Route::get('/user-views', function () {
    $schedules = Schedule::where('pickup_time', '>=', now())
                         ->orderBy('pickup_time', 'asc')
                         ->take(5) 
                         ->get();
    $trashcans = \App\Models\Trashcan::all(); 
    $emission = \App\Models\Emission::latest()->first();

    return view('user-views', compact('schedules', 'trashcans', 'emission'));
})->name('user.views');

Route::get('/trashcans-ui', function () {
    return view('trashcans.index');
});

Route::get('/users-ui', function () {
    return view('users.index');
});