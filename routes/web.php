<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\DepartmentContentController as AdminDepartmentContentController;
use App\Http\Controllers\Admin\DepartmentFaqController as AdminDepartmentFaqController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ChatbotController;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('welcome');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/department/{code}', [PublicController::class, 'department'])->name('department.show');

// Enquiry route (public)
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

// Chatbot route (public)
Route::post('/chatbot/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Departments
    Route::resource('departments', AdminDepartmentController::class);
    
    // Department Contents (nested under departments)
    Route::prefix('departments/{departmentId}/contents')->name('departments.contents.')->group(function () {
        Route::get('/', [AdminDepartmentContentController::class, 'index'])->name('index');
        Route::get('/create', [AdminDepartmentContentController::class, 'create'])->name('create');
        Route::post('/', [AdminDepartmentContentController::class, 'store'])->name('store');
        Route::get('/{contentId}/edit', [AdminDepartmentContentController::class, 'edit'])->name('edit');
        Route::put('/{contentId}', [AdminDepartmentContentController::class, 'update'])->name('update');
        Route::delete('/{contentId}', [AdminDepartmentContentController::class, 'destroy'])->name('destroy');
    });
    
    // Department FAQs (nested under departments)
    Route::prefix('departments/{departmentId}/faqs')->name('departments.faqs.')->group(function () {
        Route::get('/', [AdminDepartmentFaqController::class, 'index'])->name('index');
        Route::get('/create', [AdminDepartmentFaqController::class, 'create'])->name('create');
        Route::post('/', [AdminDepartmentFaqController::class, 'store'])->name('store');
        Route::get('/{faqId}', [AdminDepartmentFaqController::class, 'show'])->name('show');
        Route::get('/{faqId}/edit', [AdminDepartmentFaqController::class, 'edit'])->name('edit');
        Route::put('/{faqId}', [AdminDepartmentFaqController::class, 'update'])->name('update');
        Route::delete('/{faqId}', [AdminDepartmentFaqController::class, 'destroy'])->name('destroy');
    });
    
    // Faculty
    Route::resource('faculty', AdminFacultyController::class);
    
    // Courses
    Route::resource('courses', AdminCourseController::class);
    
    // Settings
    Route::resource('settings', AdminSettingController::class);
    
    // Enquiries
    Route::get('/enquiries', [AdminEnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/{id}/edit', [AdminEnquiryController::class, 'edit'])->name('enquiries.edit');
    Route::put('/enquiries/{id}', [AdminEnquiryController::class, 'update'])->name('enquiries.update');
    Route::delete('/enquiries/{id}', [AdminEnquiryController::class, 'destroy'])->name('enquiries.destroy');
    
    // Announcements
    Route::resource('announcements', AdminAnnouncementController::class);
});

// College Management System API Routes (Commented out for now)
/*
Route::prefix('api')->group(function () {
    // Departments
    Route::apiResource('departments', DepartmentController::class);
    
    // Faculty
    Route::get('faculty', [App\Http\Controllers\FacultyController::class, 'index']);
    Route::get('faculty/{faculty}', [App\Http\Controllers\FacultyController::class, 'show']);
    Route::get('departments/{department}/faculty', [App\Http\Controllers\FacultyController::class, 'byDepartment']);
    
    // Courses
    Route::get('courses', [App\Http\Controllers\CourseController::class, 'index']);
    Route::get('courses/{course}', [App\Http\Controllers\CourseController::class, 'show']);
    Route::get('departments/{department}/courses', [App\Http\Controllers\CourseController::class, 'byDepartment']);
    
    // Settings
    Route::get('settings', [App\Http\Controllers\SettingController::class, 'index']);
    Route::get('settings/{key}', [App\Http\Controllers\SettingController::class, 'show']);
    Route::post('settings', [App\Http\Controllers\SettingController::class, 'store']);
});
*/
