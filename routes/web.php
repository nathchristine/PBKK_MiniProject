<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;   

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Listing + filtering by genre name
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

    // CRUD (you'll build the pages later)
    Route::get('/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movie.store');
    Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movie.show');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movie.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
});

require __DIR__.'/auth.php';
