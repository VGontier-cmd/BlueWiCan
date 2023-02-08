<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// dasgboard page
Route::get('/', [CoreController::class, 'dashboard'])->name('dashboard');

// homepage path
Route::get('/saved', [CoreController::class, 'saved'])->name('saved');

// live page
Route::get('/live', [CoreController::class, 'live'])->name('live');

// save data
Route::post('/save-data', [CoreController::class, 'store']);


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for authentication and user's
| account
|
*/

Route::get('/login', [AuthController::class, 'signin'])->name('signin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'signup'])->name('signup');
Route::post('/register', [AuthController::class, 'register'])->name('register');
