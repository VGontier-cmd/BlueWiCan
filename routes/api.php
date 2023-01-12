<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocketsController;
use App\Events\SendData;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/sockets/connect", [SocketsController::class, "connect"]);


Route::post("/data/send", function(Request $request) {
    
    $id = $request->input("id", null);
    $trame = $request->input("trame", null);
    $sizeTrame = strlen($trame);
    $date = (new DateTime(now()))->format(DateTime::ATOM);
    SendData::dispatch($id, $trame, $sizeTrame, $date);
});