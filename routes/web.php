<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// All Listing
Route::get('/', [ListingController::class, 'index']);

//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Edit Submit to update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');

//show Register create form
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//Create  New User
Route::post('/users',[UserController::class,'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout']);

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In user
Route::post('users/authenticate', [UserController::class, 'authenticate']);

//Show Manage Listings
Route::get('/manage', [ListingController::class, 'manage'])->middleware('auth');


