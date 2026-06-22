<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route:: get('/',function(){
    return view('home');
});
Route::resource('user', UserController::class);
Route::resource('user', UserController::class)->except(['create', 'store'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checkLogin'])->name('login.check');
Route::resource('category',CategoryController::class);
Route::resource('product', ProductController::class);