<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('/user', \App\Http\Controllers\Api\UserController::class)->except('create');

// put is not working in axios
// always returns 422
// this is the update route
Route::post('/user/{user}', [\App\Http\Controllers\Api\UserController::class, 'update']);
