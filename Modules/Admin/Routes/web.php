<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;

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

Route::middleware(['auth:admin'])->prefix('admin')->name('module.admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('create', [AdminController::class, 'create'])->name('create');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::get('edit/{admin}', [AdminController::class, 'edit'])->name('edit');
    Route::put('update/{admin}', [AdminController::class, 'update'])->name('update');
    Route::delete('delete/{admin}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('/show/{admin}', [AdminController::class, 'show'])->name('show');
});
