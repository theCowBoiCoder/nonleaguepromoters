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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('register',[\App\Http\Controllers\HomeController::class,'register'])->name('register');
Route::post('register',[\App\Http\Controllers\HomeController::class,'registerUser'])->name('register.store');
Route::group(['prefix' => 'player'], function () {
    Route::get('search', [\App\Http\Controllers\PlayerController::class, 'index'])->name('search');
    Route::get('{player}',[\App\Http\Controllers\PlayerController::class,'single'])->name('single');
});

