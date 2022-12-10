<?php

use App\Http\Controllers\DrinkController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

// Route::resource('drinks',DrinkController::class );

// Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

// Route::get('/search', [SearchController::class, 'search'])->name('item.search');

// Route::get('my_favorites', [DrinkController::class, 'myFavorites']);

// Route::post('/favorite/{drink}', [DrinkController::class, 'favorite']);
// Route::post('/unfavorite/{drink}', [DrinkController::class, 'unFavorite']);

Route
// ::middleware(['auth:api'])
::middleware(['api'])
    ->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

        Route::resource('drinks', DrinkController::class);
        Route::resource('tags', TagController::class);
        Route::resource('comments', CommentController::class);

        // Route::get('/search', [SearchController::class, 'search'])->name('item.search');

        Route::get('my_favorites', [DrinkController::class, 'myFavorites']);

        Route::post('/bookmark/{drink}', [DrinkController::class, 'bookmark']);
        Route::post('/unbookmark/{drink}', [DrinkController::class, 'unbookmark']);
    });

Route::fallback(function () {
    abort(404, 'Route Not Found.');
});
// Route::middleware('api')->get('/user', function (Request $request) {

// Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

// Route::resource('drinks',DrinkController::class );

// Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

// Route::get('/search', [SearchController::class, 'search'])->name('item.search');

// Route::get('my_favorites', [DrinkController::class, 'myFavorites']);

// Route::post('/favorite/{drink}', [DrinkController::class, 'favorite']);
// Route::post('/unfavorite/{drink}', [DrinkController::class, 'unFavorite']);
//     return $request->user();
// });
