<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\SearchController;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

Route::resource('drinks',DrinkController::class );

Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

Route::get('/search', [SearchController::class, 'search'])->name('item.search');
Route::get('my_favorites', [DrinkController::class, 'myFavorite'])->middleware('auth');

Route::post('/favorite/{drink}', [DrinkController::class, 'favorite']);
Route::post('/unfavorite/{drink}', [DrinkController::class, 'unFavorite']);

