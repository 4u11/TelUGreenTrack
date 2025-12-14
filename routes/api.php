<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrashcanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {


    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('trashcans', TrashcanController::class)->only(['index', 'show']);

    Route::middleware(['role:admin'])->group(function () {

        Route::apiResource('trashcans', TrashcanController::class)->except(['index', 'show']);

        Route::apiResource('users', UserController::class);
    });

});
