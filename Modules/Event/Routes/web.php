<?php

use Illuminate\Support\Facades\Route;
use Modules\Event\Http\Controllers\EventController;

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

Route::prefix('admin/event')->name('module.event.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::post('/store', [EventController::class, 'store'])->name('store');
    Route::get('/show/{event}', [EventController::class, 'show'])->name('show');
    Route::get('/edit/{event}', [EventController::class, 'edit'])->name('edit');
    Route::put('/update/{event}', [EventController::class, 'update'])->name('update');
    Route::delete('/delete/{event}', [EventController::class, 'destroy'])->name('destroy');
    Route::get('/bookedseats/{seats}', [EventController::class, 'bookedSeats'])->name('bookedseats');
});

Route::post('event/comment', [EventController::class, 'commentStore'])->name('event.comment.store');
Route::post('event-load-data', [EventController::class, 'loadMoreData'])->name('event-comment-data-load');
