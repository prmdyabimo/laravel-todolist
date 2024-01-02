<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// TESTING TEMPLATE
Route::get('/template', function () {
    return view('template');
});

// USER CONTROLLER
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware(['guest.only']);
    Route::post('/login', 'doLogin')->middleware(['guest.only']);
    Route::post('/logout', 'doLogout');
});
