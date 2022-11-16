<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\Http\Controllers\StudentController;


Route::middleware(['auth:admin'])->prefix('admin/student')->name('module.student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('create', [StudentController::class, 'create'])->name('create');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('edit/{student}', [StudentController::class, 'edit'])->name('edit');
    Route::put('update/{student}', [StudentController::class, 'update'])->name('update');
    Route::get('student/details/{student}', [StudentController::class, 'show'])->name('show');
    Route::delete('delete/{student}', [StudentController::class, 'destroy'])->name('destroy');
    Route::get('/show/{student}', [StudentController::class, 'show'])->name('show');
    Route::get('pdf-download', [StudentController::class, 'getAllStudents'])->name('pdf.download');
    Route::get('download-pdf', [StudentController::class, 'downloadPdf'])->name('download.pdf');
    Route::get('/export-excel', [StudentController::class, 'exportIntoExcel'])->name('download.excel');
    Route::get('/export-csv', [StudentController::class, 'exportIntoCsv'])->name('download.csv');
});
