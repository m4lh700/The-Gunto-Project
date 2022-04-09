<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SmithController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'index'])->name('searchsmiths');
Route::get('smiths', [SmithController::class, 'index'])->name('indexsmiths');
Route::get('smiths/favorites', [SmithController::class, 'favorites'])->middleware(['auth'])->name('favoritesmiths');
route::get('smiths/favorites/remove/{id}', [SmithController::class, 'removeFavorite'])->middleware(['auth'])->name('removefavoritesmith');
route::get('smiths/favorites/add/{id}', [SmithController::class, 'addFavorite'])->middleware(['auth'])->name('addfavoritesmith');
Route::get('smiths/{slug}', [SmithController::class, 'show'])->name('showsmith');

//Route::get('/', function () {
    //return view('home');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
