<?php

use Illuminate\Support\Facades\Route;

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
//LANDING PAGE ROUTE
Route::get('/', [\App\Http\Controllers\HomeController::class, 'landing'])->name('home');

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('register', [\App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::post('register', [\App\Http\Controllers\HomeController::class, 'registerUser'])->name('register.store');
Route::get('login', [\App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\HomeController::class, 'auth'])->name('auth.login');
Route::get('logout', [\App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/', [\App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('profile');
});
Route::group(['prefix' => 'player'], function () {
    Route::get('players', [\App\Http\Controllers\PlayerController::class, 'players'])->name('players');
    Route::get('search', [\App\Http\Controllers\PlayerController::class, 'index'])->name('search');
    Route::get('{player}', [\App\Http\Controllers\PlayerController::class, 'single'])->name('single');
});

