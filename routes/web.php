<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'about']);
Route::get('/menu', [PageController::class, 'menu']);
Route::get('/contacts', [PageController::class, 'contacts']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/register', [PageController::class, 'register'])->name('register');

    Route::post('/api/v1/login', [AuthController::class, 'login']);
    Route::post('/api/v1/registration', [AuthController::class, 'registration']);
});

Route::middleware('auth')->group(function () {
    Route::post('/api/v1/logout', [AuthController::class, 'logout']);
});

Route::get('/api/v1/getFoods', [FoodController::class, 'getFoods']);
Route::get('/api/v1/getSliderFoods', [FoodController::class, 'getSliderFoods']);
Route::get('/menu/{id}', [FoodController::class, 'getFood']);

Route::middleware('admin')->group(function () {
    Route::get('/admin', [PageController::class, 'adminIndex']);
    Route::get('/admin/foods', [PageController::class, 'adminFoods']);
    Route::get('/admin/category', [PageController::class, 'adminCategory']);

    Route::delete('/api/v1/deleteFood/{id}', [FoodController::class, 'deleteFood']);
});
