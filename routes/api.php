<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
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

Route::prefix('auth')->group( function() {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('register', [RegisterController::class, 'register']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List filiais
Route::get('filiais/{userId}', [FilialController::class, 'index']);

// List single filial
Route::get('filial/{id}', [FilialController::class, 'show']);

// Create new filial
Route::post('filial', [FilialController::class, 'store']);

// Update filial
Route::put('filial/{id}', [FilialController::class, 'update']);

// Delete filial
Route::delete('filial/{id}', [FilialController::class,'destroy']);
