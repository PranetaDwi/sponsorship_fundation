<?php

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('api.login');
    Route::post('/register', [RegisterController::class, 'userRegister'])->name('api.register');
});

Route::middleware('auth:api')->group(function () {
    Route::middleware(['scope:organizer,entrepreneur'])->group(function () {
        Route::get('/home', function () {
            return 'Welcome to Organizer & Entrepreneur in Dashboard';
        });
    });

    Route::middleware(['scopes:organizer'])->group(function () {
        Route::get('/my-event', function () {
            return 'Welcome to Organizer Dashboard';
        });
    });

    Route::middleware(['scopes:entrepreneur'])->group(function () {
        Route::get('/my-sponsorship', function () {
            return 'Welcome my Sponsor Menu';
        });
    });

});


