<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::resource('user', UserController::class)->only(['create', 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checkLogin'])->name('login.check');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');

    Route::resource('user', UserController::class)->except(['create', 'store', 'index']);

    Route::middleware('role:customer,vendor,admin')->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class)->only(['index']);

        Route::get('/vendor/products/view', function () {
            $products = \App\Models\Product::with('category')
                ->where('status', true)
                ->where('stock', '>', 0)
                ->get();

            return view('customer.products', compact('products'));
        })->name('vendor.products.view');

        Route::get('/customer/profile', function () {
            $user = Auth::user();
            return view('customer.profile', compact('user'));
        })->name('customer.profile');

        Route::get('/customer/products', function () {
            $products = \App\Models\Product::with('category')
                ->where('status', true)
                ->where('stock', '>', 0)
                ->get();

            return view('customer.products', compact('products'));
        })->name('customer.products');
    });

    Route::middleware('role:vendor,admin')->group(function () {
        Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
        Route::get('/vendor/profile', [VendorController::class, 'profile'])->name('vendor.profile');
        Route::post('/vendor/profile', [VendorController::class, 'storeProfile'])->name('vendor.profile.store');

        Route::resource('vendor/products', ProductController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
            ->names([
                'index' => 'vendor.products.index',
                'create' => 'vendor.products.create',
                'store' => 'vendor.products.store',
                'edit' => 'vendor.products.edit',
                'update' => 'vendor.products.update',
                'destroy' => 'vendor.products.destroy',
            ]);
    });
});
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');