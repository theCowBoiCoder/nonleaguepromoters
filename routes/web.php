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
//Route::get('/', [\App\Http\Controllers\HomeController::class, 'landing'])->name('landing');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::group(['prefix' => 'contact-us', 'as' => 'contact.'], function () {
    Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('index');
    Route::post('/', [\App\Http\Controllers\ContactController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
    Route::get('register', [\App\Http\Controllers\StaffController::class, 'register'])->name('register');
});

Route::get('register', [\App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::post('register', [\App\Http\Controllers\HomeController::class, 'registerUser'])->name('register.store');
Route::post('delete', [\App\Http\Controllers\HomeController::class, 'deleteUser'])->name('delete.user');
Route::get('login', [\App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\HomeController::class, 'auth'])->name('auth.login');
Route::get('logout', [\App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('password-change/{user}', [\App\Http\Controllers\HomeController::class, 'passwordChange'])->name('password.change');
Route::post('password-change/{user}', [\App\Http\Controllers\HomeController::class, 'passwordConfirm'])->name('password.change.store');
Route::get('password-reset', [\App\Http\Controllers\HomeController::class, 'reset'])->name('reset');
Route::post('password-reset', [\App\Http\Controllers\HomeController::class, 'resetStore'])->name('reset.update');
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/', [\App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('profile');
    Route::get('{user}/my-messages', [\App\Http\Controllers\ProfileController::class, 'messages'])->name('my_messages');
    Route::get('{user}/my-messages/{message_id}', [\App\Http\Controllers\ProfileController::class, 'readMessages'])->name('my_messages.read');
});
Route::group(['prefix' => 'player'], function () {
    Route::get('players', [\App\Http\Controllers\PlayerController::class, 'players'])->name('players');
    Route::get('search', [\App\Http\Controllers\PlayerController::class, 'index'])->name('search');
    Route::get('{player_id}', [\App\Http\Controllers\PlayerController::class, 'single'])->name('single');
    Route::get('{player_id}/message', [\App\Http\Controllers\PlayerController::class, 'messageForm'])->name('message');
    Route::post('{player_id}/message/send', [\App\Http\Controllers\PlayerController::class, 'messageSend'])->name('message.sent');
});

Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
    Route::get('search', [\App\Http\Controllers\StaffController::class, 'index'])->name('search');
    Route::get('filter', [\App\Http\Controllers\StaffController::class, 'filter'])->name('filter');
    Route::get('{staff}', [\App\Http\Controllers\StaffController::class, 'single'])->name('single');
    Route::get('{staff_id}/message',[\App\Http\Controllers\StaffController::class,'messageForm'])->name('message');
    Route::get('{staff_id}/message/send',[\App\Http\Controllers\StaffController::class,'messageSend'])->name('message.sent');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [\App\Http\Controllers\Admin\AdminController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AdminController::class, 'authenticate'])->name('authenticate');
    Route::get('logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logout');

    //Dashboard Routes
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});

