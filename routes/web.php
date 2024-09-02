<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//All Listings
Route::get('/', [ListingController::class, 'index']);
//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
//Store Listing Data
Route::post('/listings/',  [ListingController::class, 'store'])->middleware('auth');
//Update Post
Route::patch('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
//Show Edit Form
Route::get('/listings/{listing}/edit',  [ListingController::class, 'edit'])->middleware('auth');
//Delete Post
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
//MyListings
Route::get('/listings/mylistings',  [ListingController::class, 'mylistings'])->middleware('auth');
//Single Listing
Route::get('/listings/{listing}',  [ListingController::class, 'show']);


//User Listings
Route::get('/users/{user}/listings',  [ListingController::class, 'user']);


//Show Register/Create Form
Route::get('/register',  [UserController::class, 'create'])->middleware('guest');
//Create New Users
Route::post('/users',  [UserController::class, 'store'])->middleware('guest');
//Logout User
Route::post('/logout',  [UserController::class, 'logout'])->middleware('auth');
//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
//Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing
