<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;



// Product Resource 
Route::resource('products', ProductController::class);
Route::get('product/fetch', [ProductController::class, 'fetch']);
// Cart  
Route::get('add-to-cart/{id}',    [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('view-cart',           [CartController::class, 'view'])->name('view-cart');
Route::patch('update-cart',       [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
// Order 
Route::post('place-order',        [OrderController::class, 'placeOrder'])->name('place.order');
Route::get('orders',              [OrderController::class, 'index'])->name('orders.index');