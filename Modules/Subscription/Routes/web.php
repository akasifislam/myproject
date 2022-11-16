<?php

use Illuminate\Support\Facades\Route;
use Modules\Subscription\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin/subscription')->name('module.email.')->group(function() {
    Route::get('/', [SubscriptionController::class, 'index'])->name('index');
    Route::post('/store', [SubscriptionController::class, 'store'])->name('store');
    Route::delete('/destroy/{email}', [SubscriptionController::class, 'destroy'])->name('destroy');
});
