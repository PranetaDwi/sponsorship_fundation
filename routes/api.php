<?php

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\Entrepreneur\Umkm\UmkmController;
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
        Route::post('/register', [RegisterController::class, 'userRegister'])->name('api.register');
    });

    // Endpoint tanpa autentikasi

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
            Route::post('/organization-enrollment', [OrganizationController::class, 'store'])->name('api.organization-enrollment');
            Route::get('/organization-lists', [OrganizationController::class, 'index'])->name('api.organization-lists');
            Route::post('/add-organization/{id}', [OrganizationController::class, 'addOrganization'])->name('api.add-organization');

            Route::prefix('events')->group(function () {
                Route::get('event-categories', [EventController::class, 'eventCategories'])->name('api.event-categories');
                Route::get('/my-event-lists', [EventController::class, 'index'])->name('api.my-event-lists');
                Route::post('/create', [EventController::class, 'store'])->name('api.event-create');
                Route::get('/detail-event/{id}', [EventController::class, 'show'])->name('api.event-show');
                Route::put('/update/{id}', [EventController::class, 'update'])->name('api.event-update');
                Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('api.event-delete');
            });
        });
    
        // Untuk user entrepreneur
        Route::middleware(['scopes:entrepreneur'])->group(function () {
            Route::post('/umkm-enrollment', [UmkmController::class, 'store'])->name('api.umkm-enrollment');
            Route::get('/umkm-lists', [UmkmController::class, 'index'])->name('api.umkm-lists');
            Route::post('/add-umkm/{id}', [UmkmController::class, 'addUmkm'])->name('api.add-umkm');
        });
    
    });
});





