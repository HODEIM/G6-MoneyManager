<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MovementController;

// LANDING PAGE VIEW
Route::get('/', function () {return view('landingPage.index');});


// CONTROLLER ROUTES
Route::post('/loginControl', [Controller::class, 'controlLogin'] );

// MOVEMENTS ROUTES
Route::get('/movements/{id}', [MovementController::class, 'index'] );


// ... ROUTES

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
