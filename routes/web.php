<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// LANDING PAGE VIEW
Route::get('/', function () {
    return view('landingPage.index');
});

Route::get('/lang/{lang}', [LangController::class, 'change'])->name('lang.change');

// Controller ROUTES
Route::post('/loginControl', [Controller::class, 'login']);

// ... ROUTES

// Auth::routes();

Route::post('/logoutControl', [Controller::class, 'logout'])->middleware("auth");;

// accounts ROUTES
Route::get('/accounts', [AccountController::class, 'index'])->middleware("auth");

// Admin ROUTES
Route::get('/admin', [AdminController::class, 'index'])->middleware("auth");

Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->middleware("auth");

Route::patch('/admin/update', [AdminController::class, 'update'])->middleware("auth");

Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->middleware("auth");

Route::get('/locked', function () {
    return view('locked');
});




// UserController ROUTES
Route::get('/signup/create', [UserController::class, 'create']);
Route::post('/signup', [UserController::class, 'store']);
