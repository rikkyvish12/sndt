<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\PublicController;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('welcome');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Departments
    Route::resource('departments', AdminDepartmentController::class);
    
    // Faculty
    Route::resource('faculty', AdminFacultyController::class);
    
    // Courses
    Route::resource('courses', AdminCourseController::class);
    
    // Settings
    Route::resource('settings', AdminSettingController::class);
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
