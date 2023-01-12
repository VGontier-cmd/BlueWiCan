<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreController;
use Illuminate\Http\Request;
use App\Events\SendData;

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
Route::get('/live', [CoreController::class, 'live'])->name('live');


Route::post("/data/send", function(Request $request) {
    $id = $request->input("id", "test");
    $trame = $request->input("trame", "test");
    $sizeTrame = sizeof($trame);
    $date = (new DateTime(now()))->format(DateTime::ATOM);

    SendData::dispatch($id, $trame, $sizeTrame, $date);
});