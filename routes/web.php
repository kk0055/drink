<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\SearchController;




// Auth::routes();


// Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

// Route::resource('drinks',DrinkController::class );

// Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

// Route::get('/search', [SearchController::class, 'search'])->name('item.search');

// Route::get('my_favorites', [DrinkController::class, 'myFavorites']);

// Route::post('/favorite/{drink}', [DrinkController::class, 'favorite']);
// Route::post('/unfavorite/{drink}', [DrinkController::class, 'unFavorite']);

Route::get('/{any?}', function () {
  return view('welcome');
})->where('any',
  '.*'
);