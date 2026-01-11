<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CartController;

//Welcome
Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');
    
//Cart
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])
    ->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])
    ->name('cart.update');

//Categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->name('categories.show');

//Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//Offers
Route::resource('offers', OfferController::class)
    ->only(['index', 'show']);

//Products
Route::resource('products', ProductController::class);
Route::get('/products-on-sale', [ProductController::class, 'onSale'])
    ->name('products.on-sale');