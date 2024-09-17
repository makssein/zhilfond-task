<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest', 'controller' => AuthController::class], function () {
    Route::get('/login', 'render')->name('login');
    Route::post('/login', 'login')->name('login');
});

Route::group(['as' => 'products.', 'controller' => ProductsController::class], function () {
    Route::get('/', 'render')->name('render');
});

Route::group(['as' => 'cart.', 'controller' => CartController::class], function () {
    Route::get('/cart', 'render')->name('cart');
    Route::post('/add-to-cart/{product}', 'addToCart')->name('addToCart');
    Route::post('/checkout', 'checkout')->name('checkout');
});

Route::group(['as' => 'orders.', 'controller' => OrdersController::class, 'middleware' => 'auth'], function () {
    Route::get('/orders', 'render')->name('render');
    Route::delete('/orders/{order}', 'delete')->name('delete');
});
