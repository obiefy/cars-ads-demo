<?php

use App\Http\Controllers\API\AdsController;
use App\Http\Controllers\API\AuthController;
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

Route::middleware('auth:api')->group(function () {
    // Users endpoints
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Ads endpoints
    Route::post('/ads', [AdsController::class, 'store']);
    Route::get('/ads', [AdsController::class, 'index']);
    Route::get('/ads/{ads}', [AdsController::class, 'show']);
});

Route::post('/login', [AuthController::class, 'login']);
