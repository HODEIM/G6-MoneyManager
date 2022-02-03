<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\LangController;

// LANDING PAGE VIEW
Route::get('/', function () {
    return view('landingPage.index');
});

Route::get('/lang/{lang}', [LangController::class, 'change'])->name('lang.change');

Auth::routes(['verify' => true]);


// Controller ROUTES
Route::post('/loginControl', [Controller::class, 'login']);

Route::post('/logoutControl', [Controller::class, 'logout'])->middleware("auth");

Route::get('/logoutControl', [Controller::class, 'logout'])->middleware("auth");

Route::get('/locked', function () {
    return view('locked');
});

Route::get('/noPermissions', function () {
    return view('noPermissions');
});


// accounts ROUTES
Route::get('/accounts', [AccountController::class, 'index'])->middleware(["auth", "verified"]);

Route::get('/accounts/create', [AccountController::class, 'create'])->middleware(["auth", "verified"]);

Route::post('/accounts/store', [AccountController::class, 'store'])->middleware(["auth", "verified"]);

Route::post('/accounts/acceptInvitation', [AccountController::class, 'acceptInvitation'])->middleware("auth");

// movements ROUTES

Route::get('/account/{id}', [MovementController::class, 'index'])->middleware(["auth", "verified"]);

Route::post('/movement/store', [MovementController::class, 'store'])->middleware(["auth", "verified"]);

Route::delete('/movement/{id}', [MovementController::class, 'destroy'])->middleware(["auth", "verified"]);

// concept ROUTES

Route::post('/concept/store', [ConceptController::class, 'store'])->middleware("auth");

// Admin ROUTES
Route::get('/admin', [AdminController::class, 'index'])->middleware(["auth", "verified"]);

Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->middleware(["auth", "verified"]);

Route::patch('/admin/update', [AdminController::class, 'update'])->middleware(["auth", "verified"]);

Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->middleware(["auth", "verified"]);

// User ROUTES
Route::get('/profile/edit', [Controller::class, 'profile'])->middleware("auth");

Route::patch('/profile/update', [UserController::class, 'update'])->middleware("auth");

Route::patch('/profile/lock', [UserController::class, 'lock'])->middleware("auth");

// Invitation
Route::get('/account/{idAccount}/invite/{idUser}', [AccountController::class, 'invite'])->middleware("auth");