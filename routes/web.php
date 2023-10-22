<?php

use App\Http\Controllers\LastFmController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MusicBrainzController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\ResultController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ViewController::class, 'welcome'])->name('welcome');
Route::get('/login', [ViewController::class, 'login'])->name('login');
Route::get('/register', [ViewController::class, 'register'])->name('register');
Route::get('/filters', [ViewController::class, 'filters'])->name("filters");
Route::get('/events', [ViewController::class, 'events'])->name("events");
Route::get('/artists', [ResultController::class, 'showGrid']);
Route::get('/map', [MapController::class, 'show']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ViewController::class, 'dashboard'])->name("dashboard");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
