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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//         ->header('Content-Type', 'text/plain')
//         ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' . $request->id;
// });

//All Listings
Route::get('/', [ListingController::class, 'index']);

//Show create form
Route::get('/listing/create', [ListingController::class, 'create'])
    ->middleware('auth');

//Store Listing Data
Route::post('/listing', [ListingController::class, 'store']);

//Manage Listing
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');

//Show form edit
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update listing data
Route::put('/listing/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete listing data
Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')
    ->middleware('guest');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
