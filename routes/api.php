<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\TipoffController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/lol', function () {
    return 'sup';
});
Route::apiResource('people', PersonController::class);
Route::apiResource('tipoffs', TipoffController::class);
Route::apiResource('actions', ActionController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('media', MediaController::class);
Route::post('/users/uuid', [UserController::class, 'getByUUID']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/init', [UserController::class, 'init']);
});
