<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputadorController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Public routes - viewable by all users
Route::get('/computadores', [ComputadorController::class, 'index'])->name('computadores.index');

// Admin only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/computadores/create', [ComputadorController::class, 'create'])->name('computadores.create');
    Route::post('/computadores', [ComputadorController::class, 'store'])->name('computadores.store');
});

// Routes with parameters should come after specific routes
Route::get('/computadores/{computador}', [ComputadorController::class, 'show'])->name('computadores.show');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/computadores/{computador}/edit', [ComputadorController::class, 'edit'])->name('computadores.edit');
    Route::put('/computadores/{computador}', [ComputadorController::class, 'update'])->name('computadores.update');
    Route::delete('/computadores/{computador}', [ComputadorController::class, 'destroy'])->name('computadores.destroy');
});