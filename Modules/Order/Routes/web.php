<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\OrderController;

Route::get('/course/purchase', [OrderController::class, 'orderPurchase'])->name('course.purchases.history');
Route::post('/order/place', [OrderController::class, 'orderPlace'])->name('order.place');
Route::post('stripe/payment', [OrderController::class, 'stripePost'])->name('stripe.payment.post');
Route::post('razorpay-payment', [OrderController::class, 'razorStore'])->name('razorpay.payment.store');
