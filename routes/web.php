<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

// Authentication routes provided by Breeze
require __DIR__.'/auth.php';

// Routes accessible to authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::put('/profile/preferences', [UserController::class, 'updatePreferences'])->name('profile.preferences.update');
});











