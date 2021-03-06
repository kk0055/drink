<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\SearchController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [DrinkController::class, 'index'])->name('drinks.index');

Route::resource('drinks',DrinkController::class );

Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

Route::get('/search', [SearchController::class, 'search'])->name('item.search');