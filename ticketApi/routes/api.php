<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Location
Route::get('/locations', [LocationController::class, 'index']);

// Schedule
Route::get('/schedules', [ScheduleController::class, 'index']);
Route::get('/schedules/time', [ScheduleController::class, 'time']);

// Orders
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);
Route::post('/order/{id}/pay', [OrderController::class, 'pay']);
Route::post('/order/{id}/add_info', [OrderController::class, 'update']);
