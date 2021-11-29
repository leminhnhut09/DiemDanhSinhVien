<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    });
    Route::prefix('student')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
        Route::post('/', [StudentController::class, 'show']);
        Route::get('/schedule', [StudentController::class, 'store'])->name('student.store');
    });
    Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/schedule', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/attendance/{mahp}', [TeacherController::class, 'create'])->name('teacher.attendance');
        Route::post('/attendance', [TeacherController::class, 'update'])->name('teacher.update');
    });
});
