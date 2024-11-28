<?php

use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::get('find-bus', [BusScheduleController::class, 'findBus']);
    Route::post('routes', [RouteController::class, 'store']);
    Route::put('routes/{id}', [RouteController::class, 'update']);
    Route::delete('routes/{id}', [RouteController::class, 'destroy']);
