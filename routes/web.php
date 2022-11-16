<?php

use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RolesController;
// use App\Http\Controllers\TestController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CourseEnrollController;
use App\Http\Controllers\StudentSettingController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\StudentRegisterController;
use Modules\Event\Http\Controllers\EventController;
use App\Http\Controllers\BecomeInstructorController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Instructor\ForgotPasswordController as InstructorForgotPasswordController;
use App\Http\Controllers\Instructor\LoginController as InstructorLoginController;
use App\Http\Controllers\Instructor\ResetPasswordController as InstructorResetPasswordController;
use App\Http\Controllers\PaymentSettingController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\StripePaymentController;
use Maatwebsite\Excel\Row;
use Modules\Faq\Http\Controllers\Api\FaqController;

Route::group(['middleware' => 'install_check'], function () {

    Auth::routes();

    //Dashboard Route
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('home');

    //Profile Route
    Route::prefix('profile')->group(function () {
        Route::get('/settings', [ProfileController::class, 'setting'])->name('setting');
        Route::get('/', [ProfileController::class, 'profile'])->name('profile');
        Route::put('/update', [ProfileController::class, 'profile_update'])->name('profile.update');
        Route::put('/password/{id}', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');
    });

    //Roles Route
    Route::resource('role', RolesController::class);

    //Users Route
    Route::resource('user', UserController::class);

    //  Website Settings
    Route::get('admin/setting', [WebsiteSettingController::class, 'index'])->name('website.setting.index');
    Route::put('admin/setting/{setting}', [WebsiteSettingController::class, 'update'])->name('website.setting.update');


    // admin routes
    Route::prefix('admin')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('admin/login')->middleware('auth_logout');
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
        Route::get('/themes', [ThemeController::class, 'index'])->name('themes');
        Route::put('/themes', [ThemeController::class, 'update'])->name('themes');
    });

    // instructor routes
    Route::prefix('instructor')->group(function () {
        Route::get('/login', [InstructorLoginController::class, 'showLoginForm'])->name('instructor.login');
        Route::post('/login', [InstructorLoginController::class, 'login'])->name('instructor/login')->middleware('auth_logout');
        Route::get('dashboard', [InstructorController::class, 'index'])->name('instructor.dashboard')->middleware('auth:instructor');
    });

    // ===== Public Routes =====

    // Main Site
    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('courses', [PagesController::class, 'course'])->name('courses');
    Route::get('about', [PagesController::class, 'about'])->name('about');
    Route::get('event', [PagesController::class, 'event'])->name('event');
    Route::get('event/details/{slug}', [PagesController::class, 'eventDetails'])->name('event.details');
    Route::post('event/book/{slug}', [EventController::class, 'eventBook'])->name('event.book');
    Route::post('event/comment/store', [EventController::class, 'commentStore'])->name('event.comment');
    Route::post('/event/comments/load', [EventController::class, 'loadMoreData'])->name('event.comment.data');
    Route::get('contact', [PagesController::class, 'contact'])->name('contact');
    Route::get('/student/profile', [PagesController::class, 'profile'])->name('user.profile')->middleware('auth');
    Route::get('/course/details/{slug}', [PagesController::class, 'courseDetails'])->name('course.details');
    Route::get('/instructors/{slug}', [PagesController::class, 'instructorProfile'])->name('instructor.profile');
    Route::post('load-data', [PagesController::class, 'loadMoreData'])->name('load-data');
    Route::get('faq', [PagesController::class, 'faq'])->name('faq');

    // Student Routes
    Route::get('/register', [StudentRegisterController::class, 'showRegisterForm'])->name('student.register');
    Route::post('/student/logout', [StudentRegisterController::class, 'studentLogout'])->name('student.logout');
    Route::post('/register/store', [StudentRegisterController::class, 'store'])->name('student.register.store');
    Route::put('/profile/info', [StudentSettingController::class, 'infoUpdate'])->name('student.info.update');
    Route::put('/profile/password', [StudentSettingController::class, 'passwordUpdate'])->name('student.password.update');

    // Course enroll
    Route::middleware(['auth'])->prefix('course')->group(function () {
        Route::post('/lesson/check', [CourseEnrollController::class, 'courseLessonCheck'])->name('course.lesson.check');
        Route::post('/enroll', [CourseEnrollController::class, 'courseEnroll'])->name('course.enroll');
        Route::get('/watch/{slug}', [CourseEnrollController::class, 'courseDescription'])->name('watch.course');
    });

    Route::post('/course/progress', [CourseEnrollController::class, 'courseProgressPercentage'])->name('course.progress');
    Route::post('course-load-data', [CourseEnrollController::class, 'loadMoreData'])->name('course-load-data');


    // Become Instructor
    Route::prefix('becomeinstructor')->group(function () {
        Route::get('/', [BecomeInstructorController::class, 'index'])->name('becomeinstructor.index');
        Route::get('/register', [BecomeInstructorController::class, 'register'])->name('becomeinstructor.register');
        Route::post('/register', [BecomeInstructorController::class, 'store'])->name('becomeinstructor.store');
    });

    // Cart, Coupon and checkout
    Route::get('/carts', [CartController::class, 'carts'])->name('carts');
    Route::post('/cart/add/{course}', [CartController::class, 'cartAdd'])->name('cart.add');
    Route::post('/cart/remove/{course}', [CartController::class, 'cartRemove'])->name('cart.remove');
    Route::post('/coupon/code/apply', [CartController::class, 'applyCode'])->name('coupon.code.apply');
    Route::get('/checkout/{token}', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/course/buy/{course}', [CartController::class, 'courseBuy'])->name('course.buy');

    // Admin Reset Password
    Route::get('admin/forgot/password', [ForgotPasswordController::class, 'adminResetPasswordForm'])->name('admin.forgot.password');
    Route::post('admin/password/mail', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('admin-password-reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('admin-password-update', [ResetPasswordController::class, 'reset'])->name('admin.password.update');


    // Instructor Reset Password
    Route::get('instructor/forgot/password', [InstructorForgotPasswordController::class, 'instructorResetPasswordForm'])->name('instructor.forgot.password');
    Route::post('instructor/password/mail', [InstructorForgotPasswordController::class, 'sendResetLinkEmail'])->name('instructor.password.email');
    Route::get('instructor-password-reset/{token}', [InstructorResetPasswordController::class, 'showResetForm'])->name('instructor.password.reset');
    Route::post('instructor-password-update', [InstructorResetPasswordController::class, 'reset'])->name('instructor.password.update');

    // payment settings
    Route::get('admin/payments', [PaymentSettingController::class, 'pymentForm'])->name('admin.payments');
    Route::put('admin/stripesetting', [PaymentSettingController::class, 'stripeUpdate'])->name('admin.stripesetting');
    Route::put('admin/razorpaysetting', [PaymentSettingController::class, 'razorpayUpdate'])->name('admin.razorpaysetting');

    // order details
    Route::get('course/order/{order}', [PagesController::class, 'orderDetails'])->name('course.order.details');
});

// Artisan command
Route::get('route-clear', function () {
    Artisan::call('route:clear');
    dd("Route Cleared");
});
Route::get('optimize', function () {
    Artisan::call('optimize');
    dd("Optimized");
});
Route::get('view-clear', function () {
    Artisan::call('view:clear');
    dd("View Cleared");
});
Route::get('view-cache', function () {
    Artisan::call('view:cache');
    dd("View cleared and cached again");
});
Route::get('config-cache', function () {
    Artisan::call('config:cache');
    dd("configuration cleared and cached again");
});
