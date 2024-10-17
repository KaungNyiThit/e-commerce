<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpecController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products', [CategoryController::class, 'cate']);

Route::get('/products/success', [StripeController::class, 'success'])->name('success');
Route::get('/products/cancel', [StripeController::class, 'cancel'])->name('cancel');

Route::get('/products/check/{id}', [ProductController::class, 'check']);

Route::get('/products/buy/{id}', [StripeController::class, 'buyNow']);
Route::get('/cart/checkout', [StripeController::class, 'checkout']);

Route::get('/products/spec/{id}', [ProductController::class, 'spec']);

Route::group(['middleware' => AdminMiddleware::class], function(){
    Route::get('/products/add', [ProductController::class, 'add']);
    Route::post('/products/add', [ProductController::class, 'store']);
});

Route::get('cart/remove/{id}', [ProductController::class, 'remove']);


Route::post('/spec/add/{id}', [SpecController::class, 'create']);
Route::get('/spec/add/{id}', [SpecController::class, 'add']);

Route::post('/cart/add/{id}', [ProductController::class, 'addToCart']);
Route::get('/cart', [ProductController::class, 'cart']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');