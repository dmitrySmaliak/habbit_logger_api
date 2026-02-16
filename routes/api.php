<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('home')->name('home.')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
