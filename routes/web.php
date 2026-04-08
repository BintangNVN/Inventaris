<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('landing');
});

/* LOGIN */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

/* DASHBOARD GLOBAL (BIAR TIDAK ERROR) */
Route::middleware('auth')->get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    } elseif (auth()->user()->role === 'staff') {
        return redirect('/staff/dashboard');
    }

    return redirect('/');
})->name('dashboard');

/* ADMIN */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

/* STAFF */
Route::middleware(['auth', 'role:staff'])->prefix('staff')->group(function () {
    Route::get('/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');
});

Route::prefix('categories')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
});

Route::prefix('items')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
    Route::get('/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
    Route::post('/', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
    Route::get('/{item}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
    Route::put('/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
});