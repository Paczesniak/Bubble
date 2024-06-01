<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('songs', SongController::class);
Route::get('/home/{song_id?}', [HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/songs/{song}/add-to-favorites', [SongController::class, 'addToFavorites'])->name('songs.addToFavorites');
Route::post('/songs/{song}/remove-from-favorites', [SongController::class, 'removeFromFavorites'])->name('songs.removeFromFavorites');
Route::get('/favorites', [SongController::class, 'favoriteSongs'])->name('songs.favoriteSongs');
