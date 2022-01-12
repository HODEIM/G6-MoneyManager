<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;

// LANDING PAGE VIEW
Route::get('/', function () {
    return view('landingPage.index');
});


// Controller ROUTES
Route::post('/loginControl', [Controller::class, 'controlLogin'] );


// MOVEMENTS ROUTES
Route::get('/movements/{id}', [MovementController::class, 'index'])->middleware("auth");

// ... ROUTES
/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// UserController ROUTES
Route::get('/signup/create', [UserController::class , 'create']);
Route::post('/signup', [UserController::class , 'store']);

*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
