<?php

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\Entrepreneur\Mitra\MitraController;
use App\Http\Controllers\API\v1\Organizer\Organization\OrganizationController;
use App\Http\Controllers\API\v1\Organizer\Event\EventController;
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

Route::prefix('v1')->group(function () {
    // Endpoint untuk autentikasi
    Route::prefix('auth')->group(function () {
        Route::post('/login', [LoginController::class, 'login'])->name('api.login');
        
        // Endpoint untuk registrasi Organizer
        Route::post('/register', [RegisterController::class, 'organizerRegister'])->name('api.register-organizer');
        Route::post('/organization-enrollment/{user_id}', [OrganizationController::class, 'store'])->name('api.organization-enrollment');

        // Endpoint untuk registrasi Entrepreneur
        Route::post('/register-entrepreneur', [RegisterController::class, 'entrepreneurRegister'])->name('api.register-entrepreneur');
        Route::post('/mitra-enrollment/{user_id}', [MitraController::class, 'store'])->name('api.mitra-enrollment');

    });

    // Endpoint tanpa autentikasi
    Route::get('/welcome', function () {
        return 'Welcome to API';
    });

    // Mulai menggunakan middleware
    Route::middleware('auth:api')->group(function () {

        // Untuk user organizer dan entrepreneur
        Route::middleware(['scope:organizer,entrepreneur'])->group(function () {
            Route::get('/home', function () {
                return 'Welcome to Organizer & Entrepreneur in Dashboard';
            });
        });

        // Untuk user organizer
        Route::middleware(['scopes:organizer'])->group(function () {
            Route::get('/organization-lists', [OrganizationController::class, 'index'])->name('api.organization-lists');

            Route::prefix('events')->group(function () {
                Route::get('event-categories', [EventController::class, 'eventCategories'])->name('api.event-categories');
                Route::get('/my-event-lists', [EventController::class, 'index'])->name('api.my-event-lists');
                Route::post('/create', [EventController::class, 'store'])->name('api.event-create');
            });
        });
    
        // Untuk user entrepreneur
        Route::middleware(['scopes:entrepreneur'])->group(function () {
            Route::get('/mitra-lists', [MitraController::class, 'index'])->name('api.mitra-lists');
        });
    
    });
});





