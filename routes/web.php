<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoreController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes available to an authenticated
| user
|
*/
Route::middleware(['auth'])->group(function () {
    // dashboard page
    Route::get('/', [CoreController::class, 'dashboard'])->name('dashboard');
    // saved page
    Route::get('/saved', [CoreController::class, 'saved'])->name('saved');
    // live page
    Route::get('/live', [CoreController::class, 'live'])->name('live');
    // insert data
    Route::post('/save-data', [CoreController::class, 'store']);
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // documentaiton page
    Route::get('/docs', [DocController::class, 'docs'])->name('docs');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes available to an guest user
|
*/
Route::middleware(['guest'])->group(function () {
    // login page
    Route::get('/login', [AuthController::class, 'signin'])->name('signin');
    // login
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // register page
    Route::get('/register', [AuthController::class, 'signup'])->name('signup');
    // register
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // reset password page
    Route::get('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
    // reset password
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
});

