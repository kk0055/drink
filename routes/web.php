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

Route::get('/create', [DrinkController::class, 'create'])->name('drinks.create');
Route::get('/{drink}/show', [DrinkController::class, 'show'])->name('drink.show');
Route::get('/edit', [DrinkController::class, 'edit'])->name('drinks.edit');
Route::post('/update', [DrinkController::class, 'update'])->name('drinks.update');

Route::get('/ranking', [DrinkController::class, 'ranking'])->name('drinks.ranking');

Route::post('/{drink}/delete', [DrinkController::class, 'destroy'])->name('drinks.destroy');

Route::post('/create', [DrinkController::class, 'store'])->name('drinks.store');

Route::get('/search', [SearchController::class, 'search'])->name('item.search');