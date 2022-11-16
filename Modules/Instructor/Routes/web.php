<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseEnrollController;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Instructor\Http\Controllers\InstructorController;
use Modules\Instructor\Http\Controllers\CourseSyllabusController;
use Modules\Instructor\Http\Controllers\InstructorActivityController;

Route::middleware(['auth:admin'])->prefix('admin/instructor')->name('module.instructor.')->group(function () {

    // pdf, csv & excel routes
    Route::get('download-pdf', [InstructorController::class, 'instructorPdf'])->name('download.pdf');
    Route::get('/instructor-excel', [InstructorController::class, 'exportIntoExcel'])->name('download.excel');
    Route::get('/instructor-csv', [InstructorController::class, 'exportIntoCsv'])->name('download.csv');

    Route::get('/', [InstructorController::class, 'index'])->name('index');
    Route::get('create', [InstructorController::class, 'create'])->name('create');
    Route::post('store', [InstructorController::class, 'store'])->name('store');
    Route::get('edit/{instructor}', [InstructorController::class, 'edit'])->name('edit');
    Route::put('update/{instructor}', [InstructorController::class, 'update'])->name('update');
    Route::get('instructor/details/{instructor}', [InstructorController::class, 'show'])->name('show');
    Route::delete('delete/{instructor}', [InstructorController::class, 'destroy'])->name('destroy');
    Route::post('/education/update/order', [InstructorActivityController::class, 'updateEducationOrder'])->name('updateOrder');
    Route::get('/show/{instructor}', [InstructorController::class, 'show'])->name('show');
});

Route::middleware(['auth:instructor,admin'])->prefix('admin/instructor')->name('instructor.')->group(function () {
    Route::get('activity/{instructor}', [InstructorActivityController::class, 'activityIndex'])->name('activity');
    Route::get('experience/{instructor}', [InstructorActivityController::class, 'experience'])->name('experience');
    Route::post('education/store', [InstructorActivityController::class, 'educationStore'])->name('education.store');
    Route::get('education/edit/{education}', [InstructorActivityController::class, 'educationEdit'])->name('education.edit');
    Route::put('education/update/{education}', [InstructorActivityController::class, 'educationUpdate'])->name('education.update');
    Route::delete('destroy/{education}', [InstructorActivityController::class, 'destroy'])->name('education.delete');
    Route::post('experience/store', [InstructorActivityController::class, 'experienceStore'])->name('experience.store');
    Route::get('experience/edit/{experience}', [InstructorActivityController::class, 'experienceEdit'])->name('experience.edit');
    Route::put('experience/update/{experience}', [InstructorActivityController::class, 'experienceUpdate'])->name('experience.update');
    Route::delete('experience/destroy/{experience}', [InstructorActivityController::class, 'destroyExperience'])->name('experience.destroy');
    Route::post('/experience/update/order', [InstructorActivityController::class, 'updateExperienceOrder'])->name('updateOrder');
});

Route::middleware(['auth:instructor'])->prefix('instructor')->name('instructor.')->group(function () {

    Route::get('courses', [InstructorController::class, 'instructorCourses'])->name('courses');

    Route::get('download-pdf', [InstructorController::class, 'mycoursePdf'])->name('pdf.download.mycourse');
    Route::get('/excel-download-mycourse', [InstructorController::class, 'exportIntoMyCourseExcel'])->name('excel.download.mycourse');
    Route::get('/csv-download-mycourse', [InstructorController::class, 'exportIntoMyCourseCsv'])->name('csv.download.mycourse');

    Route::get('/excel-download', [InstructorController::class, 'downloadExcel'])->name('excel.download');
    Route::get('/csv-download', [InstructorController::class, 'downloadCSV'])->name('csv.download');

    Route::get('purchase', [InstructorController::class, 'coursePurchase'])->name('purchase');
    Route::get('purchase/details', [InstructorController::class, 'purchaseDetails'])->name('purchase.details');


    Route::prefix('course')->group(function () {

        Route::get('syllabus/{course:slug}', [CourseSyllabusController::class, 'courseSyllabus'])->name('course.syllabus');

        // Chapter
        Route::post('chapter', [CourseSyllabusController::class, 'courseChapterStore'])->name('course.chapter.store');
        Route::get('/chapter/edit/{chapter}', [CourseSyllabusController::class, 'courseChapterEdit'])->name('course.chapter.edit');
        Route::put('/chapter/update/{chapter}', [CourseSyllabusController::class, 'courseChapterUpdate'])->name('course.chapter.update');
        Route::delete('chapter/delete/{chapter}', [CourseSyllabusController::class, 'courseChapterDelete'])->name('course.chapter.delete');
        Route::post('chapter/sorting', [CourseSyllabusController::class, 'courseChapterOrderUpdate'])->name('course.chapter.updateOrder');

        // Lesson
        Route::post('chapter/lesson', [CourseSyllabusController::class, 'chapterLessonStore'])->name('chapter.lesson.store');

        Route::get('/chapter/lesson/edit/{lesson}', [CourseSyllabusController::class, 'chapterLessonEdit'])->name('chapter.lesson.edit');
        Route::delete('chapter/lesson/delete/{lesson}', [CourseSyllabusController::class, 'chapterLessonDelete'])->name('chapter.lesson.delete');
        Route::put('chapter/lesson/update/{lesson}', [CourseSyllabusController::class, 'chapterLessonUpdate'])->name('chapter.lesson.update');

        Route::get('create', [InstructorController::class, 'instructorCourseCreate'])->name('course.create');
        Route::post('store', [CourseController::class, 'store'])->name('course.store');
        Route::get('status/change', [CourseController::class, 'statusChange'])->name('course.status.change');
        Route::delete('delete/{course:slug}', [CourseController::class, 'destroy'])->name('course.destroy');
        Route::get('show/{course:slug}', [CourseController::class, 'show'])->name('course.show');
        Route::get('edit/{course:slug}', [InstructorController::class, 'instructorCourseEdit'])->name('course.edit');
        Route::put('update/{course:slug}', [CourseController::class, 'update'])->name('course.update');

        Route::get('enroll/all', [InstructorController::class, 'enrolIndex'])->name('course.enroll.index');
        Route::get('enroll/add', [InstructorController::class, 'showEnrollForm'])->name('course.enroll');
        Route::post('enroll/store', [CourseEnrollController::class, 'courseEnroll'])->name('enroll.store');
        Route::get('reviews', [InstructorController::class, 'reviews'])->name('course.reviews');
    });
});

Route::post('instructor-load-data', [InstructorController::class, 'loadMoreData'])->name('instructor-comment-data-load');
