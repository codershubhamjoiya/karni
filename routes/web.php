<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::resource('user', UserController::class)->only(['create', 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checkLogin'])->name('login.check');

Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class)->except(['create', 'store']);

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');