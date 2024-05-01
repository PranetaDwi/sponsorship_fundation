<?php

use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('admin.auth.login');})->name('login');
Route::post('/login/session', [LoginController::class, 'authenticate'])->name('login.session');
Route::post('/login/token', [AuthController::class, 'login'])->name('login.token');
Route::post('/logout/token', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout/session', [LoginController::class, 'logout'])->name('logout.session');

Route::middleware(['authlogin'])->group(function () {
    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin.managemen-kategori.coba');})->name('home');
    });

});
