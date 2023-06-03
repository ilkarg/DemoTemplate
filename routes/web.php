<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('about');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/api/v1/login', [AuthController::class, 'login']);
    Route::post('/api/v1/registration', [AuthController::class, 'registration']);
});

Route::middleware('auth')->group(function () {
    Route::post('/api/v1/logout', [AuthController::class, 'logout']);
});

Route::get('/api/v1/getFoods', [FoodController::class, 'getFoods']);
Route::get('/api/v1/getSliderFoods', [FoodController::class, 'getSliderFoods']);
