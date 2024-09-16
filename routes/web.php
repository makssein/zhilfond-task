<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => ProductsController::class], function () {
    Route::get('/', 'render');
});

Route::group(['controller' => CartController::class], function () {
    Route::get('/cart', 'render');
    Route::post('/add-to-cart/{product}', 'addToCart');
    Route::post('/checkout', 'checkout');
});

Route::group(['controller' => OrdersController::class], function () {
    Route::get('/orders', 'render');
});
