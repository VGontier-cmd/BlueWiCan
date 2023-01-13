<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreController;
use App\Websockets\SocketHandlers\UpdateDataSocketHandler;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;


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

// homepage path
Route::get('/', [CoreController::class, 'home'])->name('home');

// live page
Route::get('/live', [CoreController::class, 'live'])->name('live');

//WebSockets Handlers
WebSocketsRouter::webSocket('/socket/update-data', UpdateDataSocketHandler::class);