<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LANDING PAGE VIEW
Route::get('/', function () {
    return view('landingPage.index');
});


// Controller ROUTES
Route::post('/loginControl', [Controller::class, 'controlLogin'] );

// UserController ROUTES
Route::get('/signup/create', [UserController::class , 'create']);
Route::post('/signup', [UserController::class , 'store']);
