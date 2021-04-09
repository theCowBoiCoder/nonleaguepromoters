<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
});
