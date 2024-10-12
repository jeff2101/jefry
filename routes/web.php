<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\FlashSaleController;


// Guest Route
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');
    Route::post('/post-login', [AuthController::class, 'login'])->name('post.login'); // Beri nama untuk route login
});

// Admin Route
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Product Route
    Route::prefix('admin/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    // Distributor Route

    Route::prefix('admin/distributor')->group(function () {
        Route::get('/', [DistributorController::class, 'index'])->name('admin.distributor'); // Pastikan nama rutenya admin.distributor
        Route::get('/create', [DistributorController::class, 'create'])->name('admin.distributor.create');
        Route::post('/store', [DistributorController::class, 'store'])->name('admin.distributor.store');
        Route::get('/edit/{id}', [DistributorController::class, 'edit'])->name('admin.distributor.edit');
        Route::put('/update/{id}', [DistributorController::class, 'update'])->name('admin.distributor.update');
        Route::delete('/delete/{id}', [DistributorController::class, 'destroy'])->name('admin.distributor.destroy');
        Route::get('/admin/distributor/{id}', [DistributorController::class, 'show'])->name('admin.distributor.show');

    });



    // Flash Sale Route
    Route::prefix('flashsales')->group(function () {
        Route::get('/', [FlashSaleController::class, 'index'])->name('admin.flashsales');
        Route::get('/create', [FlashSaleController::class, 'create'])->name('flashsales.create');
        Route::post('/store', [FlashSaleController::class, 'store'])->name('flashsales.store');
        Route::get('/edit/{id}', [FlashSaleController::class, 'edit'])->name('flashsales.edit');
        Route::put('/update/{id}', [FlashSaleController::class, 'update'])->name('flashsales.update');
        Route::delete('/delete/{id}', [FlashSaleController::class, 'destroy'])->name('flashsales.delete');
        Route::get('/admin/flashsales/{id}', [FlashSaleController::class, 'show'])->name('admin.flashsales.show');

    });

    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
});

// User Route
Route::group(['middleware' => 'web'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');

    // Route untuk produk
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase'])->name('user.product.purchase'); // Beri nama untuk route pembelian

    // Route untuk flash sale
    Route::get('/user/flashsales', [UserController::class, 'flashsales'])->name('user.flashsales'); // Route untuk menampilkan flash sales
    Route::get('/flashsale/purchase/{flashSaleId}/{userId}', [UserController::class, 'purchaseFlashSale'])->name('user.flashsale.purchase'); // Route untuk pembelian flash sale
});
