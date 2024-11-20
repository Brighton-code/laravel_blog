<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('posts', PostController::class)
    ->only(['create', 'store', 'update', 'edit', 'destroy'])
    ->middleware(['auth', 'verified']);
Route::resource('posts', PostController::class)
    ->only(['index', 'show']);

require __DIR__.'/auth.php';
