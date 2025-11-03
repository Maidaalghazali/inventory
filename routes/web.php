<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('items.index');
});

// TAMBAHKAN INI - Route Dashboard
Route::get('/dashboard', function () {
    return redirect()->route('items.index');
})->middleware(['auth'])->name('dashboard');

// Routes tanpa auth - hanya lihat
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// Routes butuh login - create, store, dan delete
Route::middleware(['auth'])->group(function () {
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

// Routes khusus leader - edit dan update
Route::middleware(['auth', 'role:leader'])->group(function () {
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
