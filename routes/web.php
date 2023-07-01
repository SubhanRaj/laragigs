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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Common Resource Routes
// index - show all listings
// show - show single listing
// create - show form to create listing
// store - save listing to database
// edit - show form to edit listing
// update - update listing in database
// destroy - delete listing from database
// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create']);
// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing 
Route::put('/listings/{listing}',[ListingController::class,'update']);
// Delete Listing 
Route::delete('/listings/{listing}',[ListingController::class,'delete']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show User registration form
Route::get('/register', [UserController::class, 'create']);

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('login', [UserController::class, 'login']);

// handle login
Route::post('/users/authenticate', [UserController::class,'authenticate']);
// User Logout
Route::post('/logout', [UserController::class, 'logout']);