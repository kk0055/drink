<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\SearchController;




Auth::routes();


Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

Route::resource('drinks',DrinkController::class );

Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

Route::get('/search', [SearchController::class, 'search'])->name('item.search');

Route::get('my_favorites', [DrinkController::class, 'myFavorites']);

Route::post('/favorite/{drink}', [DrinkController::class, 'favorite']);
Route::post('/unfavorite/{drink}', [DrinkController::class, 'unFavorite']);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
    
// Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

// Route::resource('drinks',DrinkController::class );

// Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

// Route::get('/search', [SearchController::class, 'search'])->name('item.search');

// Route::get('my_favorites', [DrinkController::class, 'myFavorites']);

// Route::post('/favorite/{drink}', [DrinkController::class, 'favorite']);
// Route::post('/unfavorite/{drink}', [DrinkController::class, 'unFavorite']);
//     return $request->user();
// });
