<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/categories', function () {
    return view('categories');
})->name('categories');

Route::get('/deals', function () {
    return view('deals');
})->name('deals');

Route::get('/new-arrivals', function () {
    return view('new-arrivals');
})->name('new-arrivals');

Route::get('/product/{id}', function ($id) {
    return view('product-detail', ['productId' => $id]);
})->name('product.detail');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
