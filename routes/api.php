<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/pets', \App\Http\Controllers\Api\PetController::class);
    Route::apiResource('pets.health-records', \App\Http\Controllers\Api\HealthRecordController::class)->shallow();
    Route::apiResource('pets.reminders', \App\Http\Controllers\Api\ReminderController::class)->shallow();
});
