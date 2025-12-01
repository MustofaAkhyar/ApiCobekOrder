<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

// Menus & Categories
Route::get('/menus', [MenuController::class, 'index']);     // list kategori + menu aktif
Route::get('/menus/{menu}', [MenuController::class, 'show']); // detail menu

// Orders
Route::post('/orders', [OrderController::class, 'store']);  // checkout → buat order + items
Route::get('/orders/{order}', [OrderController::class, 'show']); // detail order + items

// (Opsional) riwayat per customer
Route::get('/customers/history', [OrderController::class, 'historyByCustomer']);

// Payments (QR)
Route::post('/payments/{order}/create', [PaymentController::class, 'create']); // generate QR payload
Route::post('/payments/webhook', [PaymentController::class, 'webhook']);       // callback dari gateway
