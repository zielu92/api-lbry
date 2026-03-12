<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('authors', App\Http\Controllers\AuthorController::class);
Route::apiResource('books', App\Http\Controllers\BookController::class, ['except' => 'store']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
});
