<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MealController;

Route::get('/', function () {
    return view('welcome');
});

// Redirect to Recipe Finder after login
Route::get('/dashboard', function () {
    return redirect()->route('recipes.search');
})->middleware(['auth', 'verified'])->name('dashboard');

// Protect Recipe Finder and other routes with auth middleware
Route::middleware('auth')->group(function () {
    // Recipe Finder route
    Route::get('/recipes', [RecipeController::class, 'search'])->name('recipes.search');
    Route::get('/meals/filter', [MealController::class, 'filter'])->name('meals.filter');
    
    // Favorite routes
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::patch('/favorites/{favorite}', [FavoriteController::class, 'update'])->name('favorites.update');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';
