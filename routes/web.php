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

// Protected routes
Route::middleware('auth')->group(function () {
    // Recipe routes
    Route::get('/recipes', [RecipeController::class, 'search'])->name('recipes.search');
    Route::get('/meals/filter', [MealController::class, 'filter'])->name('meals.filter');
    
    // Favorite routes
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::patch('/favorites/{favorite}', [FavoriteController::class, 'update'])->name('favorites.update');

    // Consolidated Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/image', [ProfileController::class, 'updateImage'])->name('profile.image');
        Route::delete('/image', [ProfileController::class, 'deleteImage'])->name('profile.image.delete');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';