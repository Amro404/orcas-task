<?php

use Illuminate\Support\Facades\Route;

use Modules\User\Http\Controllers\Api\IndexController;
use Modules\User\Http\Controllers\Api\SearchController;
use Modules\User\Http\Controllers\Auth\RegisterController;
use Modules\User\Http\Controllers\Auth\LoginController;


Route::prefix('users')->group(function() {
    Route::get('/', IndexController::class)->middleware('auth:api');
    Route::get('/search', SearchController::class)->middleware('auth:api');
    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);

});
