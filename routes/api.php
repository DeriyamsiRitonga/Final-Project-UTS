<?php

use Illuminate\Http\Controllers\CovidController;
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
    Route::get('/patient', [CovidController::class, 'index']);
});

# Method (GET) Search Resource by name
Route::get('/patient/search/{name}', [CovidController::class, 'search']);

# Method (GET) Positive Resource
Route::get('/patient/status/positive', [CovidController::class, 'positive']);

# Method (GET) Recovered Resource
Route::get('/patient/status/recovered', [CovidController::class, 'recovered']);

# Method (GET) Dead Resource
Route::get('/patient/status/dead', [CovidController::class, 'dead']);

# Endpoint Register dan Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);