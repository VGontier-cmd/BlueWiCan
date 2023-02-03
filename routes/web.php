<?php

use Illuminate\Support\Facades\Route;
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
