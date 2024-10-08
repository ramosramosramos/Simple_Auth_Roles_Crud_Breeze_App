<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::inertia('/', 'User/Dashboard')->name('dashboard');
    Route::resource('/products', ProductController::class)->except('update');
    Route::post('/products/{product}', [ProductController::class,'update'])->name('products.update');
});

// -----------------------------Authentication------------------------------------
// -----------------------------Authentication------------------------------------
Route::inertia('/login', 'Auth/Login')->name('login');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('auth/{provider}/redirect', [AuthController::class, 'redirect'])->name('auth.github');
Route::get('auth/{provider}/callback', [AuthController::class, 'callback'])->name('auth.callback');
