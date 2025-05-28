<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputadorController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Base route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Computadores Routes
Route::prefix('computadores')->group(function () {
    // Public routes
    Route::get('/', [ComputadorController::class, 'index'])->name('computadores.index');
    
    // Protected routes - Must come before {computador} route
    Route::middleware('auth')->group(function () {
        Route::get('/create', [ComputadorController::class, 'create'])->name('computadores.create');
        Route::post('/', [ComputadorController::class, 'store'])->name('computadores.store');
    });

    // Routes with parameters - Must come last
    Route::get('/{computador}', [ComputadorController::class, 'show'])->name('computadores.show');
    Route::middleware('auth')->group(function () {
        Route::get('/{computador}/edit', [ComputadorController::class, 'edit'])->name('computadores.edit');
        Route::put('/{computador}', [ComputadorController::class, 'update'])->name('computadores.update');
        Route::delete('/{computador}', [ComputadorController::class, 'destroy'])->name('computadores.destroy');
    });
});