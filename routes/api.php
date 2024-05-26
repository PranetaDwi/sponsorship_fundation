<?php

use App\Http\Controllers\API\v1\Admin\EventCategoryManagement\EventCategoryManagementController;
use App\Http\Controllers\API\v1\Admin\IconManagement\IconManagementController;
use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\Common\ProfileManagement\ProfileManagementController;
use App\Http\Controllers\API\v1\Entrepreneur\Mitra\MitraController;
use App\Http\Controllers\API\v1\Organizer\Organization\OrganizationController;
use App\Http\Controllers\API\v1\Organizer\Event\EventController;
use App\Http\Controllers\API\v1\Public\Event\PublicEventController;
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
        Route::post('/register-organizer', [RegisterController::class, 'organizerRegister'])->name('api.register-organizer');
        Route::post('/organization-enrollment/{user_id}', [OrganizationController::class, 'store'])->name('api.organization-enrollment');

        // Endpoint untuk registrasi Entrepreneur
        Route::post('/register-entrepreneur', [RegisterController::class, 'entrepreneurRegister'])->name('api.register-entrepreneur');
        Route::post('/mitra-enrollment/{user_id}', [MitraController::class, 'store'])->name('api.mitra-enrollment');

    });

    // Endpoint tanpa autentikasi
    Route::prefix('events')->group(function () {
        Route::get('/event-populer-overview', [PublicEventController::class, 'getOverviewEventPopuler'])->name('api.overview-event-populer');
        Route::get('/event-all-overview', [PublicEventController::class, 'getOverviewEventAll'])->name('api.overview-event-all');
        Route::get('/event-category/{category_id}', [PublicEventController::class, 'getOverviewEventByCategory'])->name('api.overview-event-by-category');
        // Buat detail event bakal dibagi jadi 4 endpoint utama
        Route::get('/event-detail/{event_id}/detail-information', [PublicEventController::class, 'getDetailEventInformation'])->name('api.detail-event-information');
        Route::get('/event-detail/{event_id}/list-kontraprestasi', [PublicEventController::class, 'getListEventKontraprestasi'])->name('api.list-event-kontraprestasi');
        Route::get('/event-detail/{event_id}/list-kontraprestasi/{id}', [PublicEventController::class, 'getDetailEventKontraprestasi'])->name('api.detail-event-kontraprestasi');
        Route::get('/event-detail/{event_id}/list-Mitra', [PublicEventController::class, 'getListEventMitra'])->name('api.list-event-Mitra');
    });

    // Mulai menggunakan middleware
    Route::middleware('auth:api')->group(function () {

        //logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');

        // Untuk user organizer dan entrepreneur
        Route::middleware(['scope:organizer,entrepreneur'])->group(function () {
            Route::get('/profile', [ProfileManagementController::class, 'getMyProfile'])->name('api.profile');
            // coba ngambil dari yang ada dulu :) buat sebelum update
            Route::post('/profile/update', [ProfileManagementController::class, 'getUpdateProfile'])->name('api.update-profile');
            // endpoint untuk masing-masing akun
            Route::post('/profile/update-full-name', [ProfileManagementController::class, 'updateFullName'])->name('api.update-full-name');
            Route::post('/profile/update-email', [ProfileManagementController::class, 'updateEmail'])->name('api.update-email');
            Route::post('/profile/update-phone', [ProfileManagementController::class, 'updatePhone'])->name('api.update-phone');
            Route::post('/profile/update-password', [ProfileManagementController::class, 'updatePassword'])->name('api.update-password');

        });

        // Untuk user organizer
        Route::middleware(['scopes:organizer'])->group(function () {
            Route::get('/organization-lists', [OrganizationController::class, 'index'])->name('api.organization-lists');

            Route::prefix('events')->group(function () {
                Route::get('event-categories', [EventController::class, 'eventCategories'])->name('api.event-categories');
                Route::get('/my-event-lists', [EventController::class, 'index'])->name('api.my-event-lists');

                // Endpoint untuk membuat event baru
                Route::prefix('create-event')->group(function () {
                    Route::post('/post-event-information', [EventController::class, 'postEventInformation'])->name('api.post-event-information');
                    Route::post('/post-event-fund/{event_id}', [EventController::class, 'postEventFund'])->name('api.post-event-fund');
                    Route::post('/post-event-placement/{event_id}', [EventController::class, 'postEventPlacement'])->name('api.post-event-placement');
                    Route::post('/post-kontraprestasi/{event_id}', [EventController::class, 'postKontraprestasi'])->name('api.post-kontraprestasi');
                });

                Route::prefix('update-event')->group(function () {
                    Route::get('/get-event-information/{event_id}', [EventController::class, 'getEventInformation'])->name('api.get-event-information');
                    Route::post('/update-event-information/{event_id}', [EventController::class, 'updateEventInformation'])->name('api.update-event-information');
                    Route::get('/get-event-fund/{event_id}', [EventController::class, 'geteventFund'])->name('api.get-event-fund');
                    Route::post('/update-event-fund/{event_id}', [EventController::class, 'updateEventFund'])->name('api.update-event-fund');
                    Route::get('/get-event-placement/{event_id}', [EventController::class, 'geteventPlacement'])->name('api.get-event-placement');
                    Route::post('/update-event-placement/{event_id}', [EventController::class, 'updateEventPlacement'])->name('api.update-event-placement');
                    Route::get('/get-kontraprestasi/{event_id}', [EventController::class, 'getKontraprestasi'])->name('api.get-kontraprestasi');
                    Route::post('/update-kontraprestasi/{event_id}', [EventController::class, 'updateKontraprestasi'])->name('api.update-kontraprestasi');
                });
            });

            Route::post('/update-organization-data', [OrganizationController::class, 'update'])->name('api.update-organization-data');
        });
    
        // Untuk user entrepreneur
        Route::middleware(['scopes:entrepreneur'])->group(function () {
            Route::get('/mitra-lists', [MitraController::class, 'index'])->name('api.mitra-lists');

            Route::post('/update-mitra-data', [MitraController::class, 'update'])->name('api.update-mitra-data');
        });

        // Untuk user admin
        Route::middleware(['scopes:admin'])->group(function () {
            Route::prefix('managemen-icon-kontraprestasi')->group(function () {
                Route::post('post-icon-kontraprestasi', [IconManagementController::class, 'postIconKontraprestasi'])->name('api.list-icon-kontraprestasi');
            });
            Route::prefix('managemen-categori-event')->group(function () {
                Route::get('list-categori-event', [EventCategoryManagementController::class, 'getEventCategories'])->name('api.list-categori-event');
                Route::post('post-category-event', [EventCategoryManagementController::class, 'postEventCategory'])->name('api.post-category-event');
            });
        });

        // Untuk user admin dan organizer
        Route::middleware(['scope:admin,organizer'])->group(function () {
            Route::prefix('icon-kontraprestasi')->group(function () {
                Route::get('list-icon-kontraprestasi', [IconManagementController::class, 'getIconKontraprestasi'])->name('api.list-icon-kontraprestasi');
            });
        });
    });
});





