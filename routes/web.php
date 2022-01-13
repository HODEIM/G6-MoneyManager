<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MovementController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

// LANDING PAGE VIEW
Route::get('/', function () {
    return view('landingPage.index');
});

Route::get('/lang/{lang}', [LangController::class, 'change'])->name('lang.change');

// Controller ROUTES
Route::post('/loginControl', [Controller::class, 'login']);

// MOVEMENTS ROUTES
Route::get('/accounts/{id}', [AccountController::class, 'index']);

// ... ROUTES

// Auth::routes();

Route::post('/logoutControl', [Controller::class, 'logout']);

// MOVEMENTS ROUTES
Route::get('/movements', [MovementController::class, 'index'])->middleware("auth");

// UserController ROUTES
Route::get('/signup/create', [UserController::class, 'create']);
Route::post('/signup', [UserController::class, 'store']);
