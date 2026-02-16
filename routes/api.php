<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Auth
Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('google', 'google')->name('google');
    Route::post('apple', 'apple')->name('apple');

    Route::middleware('auth')->group(function (): void {
        Route::post('refresh', 'refresh')->name('refresh');
        Route::post('logout', 'logout')->name('logout');
        Route::get('profile', 'profile')->name('profile');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('activities', ActivityController::class)->only(['index']);
});
