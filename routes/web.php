<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/{pathMatch}', function () {
//    return view('app');
//})->where('pathMatch', ".*");

Route::get('/', [\App\Http\Controllers\Backend\LoginController::class, 'showForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Backend\LoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Backend\LoginController::class, 'logout']);

Route::get('/register', [\App\Http\Controllers\Backend\RegisterController::class, 'showForm']);
Route::post('/register', [\App\Http\Controllers\Backend\RegisterController::class, 'register']);

Route::resource('/user', \App\Http\Controllers\Backend\UserController::class)->except('destroy', 'update')->middleware('auth');
