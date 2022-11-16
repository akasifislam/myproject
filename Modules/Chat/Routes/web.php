<?php

use Illuminate\Support\Facades\Route;
use Modules\Chat\Http\Controllers\ChatController;


// Route::prefix('chat')->group(function () {
//     Route::get('/', 'ChatController@index');
// });
Route::prefix('chat')->name('module.chat.')->group(function () {
    Route::get('/', [ChatController::class, 'index'])->name('index');
    Route::get('/students', [ChatController::class, 'getSearchStudents'])->name('getSearchStudent');
});
