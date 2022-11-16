<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

Route::middleware(['auth:admin'])->prefix('admin/category')->name('module.category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/create', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::post('/category/update/order', [CategoryController::class, 'updateOrder'])->name('updateOrder');
});
