<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LibrarianController;

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
});

require __DIR__.'/auth.php';

// Route::resource("/schools", SchoolController::class);
// Route::resource("/categories", CategoryController::class);
// Route::resource("/users", UserController::class);
// Route::resource("/books", BookController::class);
// Route::resource("/loans", LoanController::class);

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('/schools', SchoolController::class);
});

Route::middleware(['auth', 'role:1,2,3', 'school'])->group(function () {
    Route::resource("/categories", CategoryController::class);
});

Route::middleware(['auth', 'role:1', 'school'])->group(function () {
    Route::resource("/users", UserController::class);
});
Route::middleware(['auth', 'role:1,2', 'school'])->group(function () {
    Route::resource("/librarians", LibrarianController::class);
});

Route::middleware(['auth', 'role:1,2,3', 'school'])->group(function () {
    Route::resource("/books", BookController::class);
});

Route::middleware(['auth', 'role:1,2,3', 'school'])->group(function () {
    Route::resource("/loans", LoanController::class);
});