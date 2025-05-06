<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LandingPageController;

// Halaman login admin
Route::get('/', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Redirect dari root ke login admin (opsional)
// Route::get('/', function () {
//     return redirect()->route('admin.login');
// });


// Hanya admin yang sudah login bisa mengakses route di dalam grup ini
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Produk
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [ProductController::class, 'create'])->name('create');
        Route::match(['get', 'post'], '/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });

    // Order
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/index', [OrderController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [OrderController::class, 'select_slug'])->name('select_slug');
        Route::get('/create/{slug}', [OrderController::class, 'create'])->name('create');
        Route::match(['get', 'post'], '/detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::match(['get', 'post'], '/edit/{id}', [OrderController::class, 'edit'])->name('edit');
    });

    // Landing Page
    Route::prefix('landing-page')->name('landingPage.')->group(function () {
        Route::get('/index', [LandingPageController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [LandingPageController::class, 'create'])->name('create');
        Route::post('/store', [LandingPageController::class, 'store'])->name('store');
        Route::get('/detail', [LandingPageController::class, 'show'])->name('detail');
        Route::match(['get', 'post'], '/edit/{id}', [LandingPageController::class, 'edit'])->name('edit');
        Route::put('/{id}', [LandingPageController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [LandingPageController::class, 'destroy'])->name('destroy');
    });
});

// Public Route untuk landing page dan order oleh pelanggan
Route::get('/landing/{slug}', [LandingPageController::class, 'show_landing'])->name('landing.show_landing');
Route::post('/order', [OrderController::class, 'do_order'])->name('customer.order');
Route::get('/orders/{order_id}', [OrderController::class, 'order_details'])->name('customer.order_details');
