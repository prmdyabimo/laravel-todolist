<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodolistController;
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

Route::get('/', [HomeController::class, 'home']);

// TESTING TEMPLATE
Route::get('/template', function () {
    return view('template');
});

// USER CONTROLLER
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware(['guest.only']);
    Route::post('/login', 'doLogin')->middleware(['guest.only']);
    Route::post('/logout', 'doLogout')->middleware(['member.only']);
});

// TODOLIST CONTROLLER
Route::controller(TodolistController::class)->middleware(['member.only'])->group(function () {
    Route::get('/todolist', 'todoList');
    Route::post('/todolist', 'saveTodo');
    Route::post('/todolist/{id}/delete', 'removeTodo');
});
