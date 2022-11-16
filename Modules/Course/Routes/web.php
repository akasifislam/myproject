<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseEnrollController;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Http\Controllers\CourseSyllabusController;

Route::middleware(['auth:admin'])->prefix('admin/course')->name('module.course.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');


    Route::get('excel-course', [CourseController::class, 'exportIntoCourseExcel'])->name('excel.course');
    Route::get('csv-course', [CourseController::class, 'exportIntoCourseCsv'])->name('csv.course');
    Route::get('pdf-course', [CourseController::class, 'getAllCourses'])->name('pdf.course');


    Route::get('pdf-course', [CourseController::class, 'getAllCourses'])->name('pdf.course');
    Route::get('course-pdf', [CourseController::class, 'coursePdf'])->name('course.pdf');
    Route::get('create', [CourseController::class, 'create'])->name('create');
    Route::post('store', [CourseController::class, 'store'])->name('store');
    Route::get('edit/{course:slug}', [CourseController::class, 'edit'])->name('edit');
    Route::put('update/{course:slug}', [CourseController::class, 'update'])->name('update');
    Route::get('course/details/{course}', [CourseController::class, 'show'])->name('show');
    Route::delete('delete/{course:slug}', [CourseController::class, 'destroy'])->name('destroy');
    Route::get('status/change', [CourseController::class, 'statusChange'])->name('status.change');
    Route::get('/show/{course:slug}', [CourseController::class, 'show'])->name('show');
    Route::get('/pdf/{course}', [CourseController::class, 'pdf'])->name('pdf');
    Route::get('/enroll/courses', [CourseController::class, 'enrollCourses'])->name('enroll.index');

    Route::get('pdf-enroll', [CourseController::class, 'getAllenrolls'])->name('pdf');
    Route::get('enroll-pdf', [CourseController::class, 'enrollPdf'])->name('enroll.pdf');

    Route::get('/enroll-excel', [CourseController::class, 'exportIntoEnrolExcel'])->name('enroll.excel');
    Route::get('/enroll-csv', [CourseController::class, 'exportIntoEnrolCsv'])->name('enroll.csv');





    Route::get('/enroll/courses/{type}', [CourseController::class, 'enrollType'])->name('enroll.type');
    Route::get('/enroll/create', [CourseController::class, 'enrollCreate'])->name('enroll.create');
    Route::post('enroll/store', [CourseEnrollController::class, 'courseEnroll'])->name('enroll.store');
    Route::get('/enroll/details/{enroll}', [CourseController::class, 'enrollDetails'])->name('enroll.details');
    Route::delete('/enroll/course/delete/{enroll}', [CourseController::class, 'enrollCourseDelete'])->name('enroll.course.destroy');
});


Route::middleware(['auth:admin'])->prefix('admin/course')->group(function () {
    Route::get('chapter/{course}', [CourseSyllabusController::class, 'courseSyllabus'])->name('course.syllabus');
    Route::get('lesson/{course}', [CourseSyllabusController::class, 'courseLesson'])->name('course.lesson');

    //chapter
    Route::post('chapter', [CourseSyllabusController::class, 'courseChapterStore'])->name('course.chapter.store');
    Route::delete('chapter/delete/{chapter}', [CourseSyllabusController::class, 'courseChapterDelete'])->name('course.chapter.delete');
    Route::get('/chapter/edit/{chapter}', [CourseSyllabusController::class, 'courseChapterEdit'])->name('course.chapter.edit');
    Route::get('/lesson/edit/{chapter}', [CourseSyllabusController::class, 'courseLessonEdit'])->name('course.lesson.edit');
    Route::put('/chapter/update/{chapter}', [CourseSyllabusController::class, 'courseChapterUpdate'])->name('course.chapter.update');
    Route::post('chapter/sorting', [CourseSyllabusController::class, 'courseChapterOrderUpdate'])->name('course.chapter.updateOrder');

    //lesson
    Route::post('chapter/lesson', [CourseSyllabusController::class, 'chapterLessonStore'])->name('lesson.store');
    Route::get('/chapter/lesson/edit/{lesson}', [CourseSyllabusController::class, 'chapterLessonEdit'])->name('chapter.lesson.edit');
    Route::delete('chapter/lesson/delete/{lesson}', [CourseSyllabusController::class, 'chapterLessonDelete'])->name('chapter.lesson.delete');
    Route::put('chapter/lesson/update/{lesson}', [CourseSyllabusController::class, 'chapterLessonUpdate'])->name('chapter.lesson.update');
    Route::post('lesson/file/download', [CourseSyllabusController::class, 'lessonFileDownload'])->name('lesson.file.download');
    Route::post('lesson/sorting', [CourseSyllabusController::class, 'courseLessonOrderUpdate'])->name('course.lesson.updateOrder');
});
