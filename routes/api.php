<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest')->group(function () {
    Route::post('/v1/login', [AuthController::class, 'login']);
    Route::post('/v1/registration', [AuthController::class, 'registration']);
});

Route::post('/v1/logout', [AuthController::class, 'logout'])->middleware('auth');