<?php

use App\Http\Controllers\Admin\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\FacultysController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\StudentMController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\TeacherMController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
        Route::post('upload/services', [UploadController::class, 'store']);
        // Khoa
        Route::prefix('facultys')->group(function () {
            Route::post('add', [FacultysController::class, 'store'])->name('facultys.store');
            Route::get('list', [FacultysController::class, 'index'])->name('facultys.list');
            Route::get('edit/{makhoa}', [FacultysController::class, 'show'])->name('facultys.edit');
            Route::put('edit/{makhoa}', [FacultysController::class, 'update'])->name('facultys.update');
            Route::delete('destroy/{makhoa}', [FacultysController::class, 'destroy'])->name('facultys.destroy');
        });
        // Lớp
        Route::prefix('class')->group(function () {
            Route::get('list', [ClassController::class, 'index'])->name('class.list');
            Route::post('add', [ClassController::class, 'store'])->name('class.store');
            Route::get('edit/{malop}', [ClassController::class, 'show'])->name('class.edit');
            Route::put('edit/{malop}', [ClassController::class, 'update'])->name('class.update');
            Route::delete('destroy/{malop}', [ClassController::class, 'destroy'])->name('class.destroy');
        });
        // Sinh vien
        Route::prefix('studentM')->group(function () {
            Route::get('list', [StudentMController::class, 'index'])->name('studentM.list');
            Route::post('add', [StudentMController::class, 'store'])->name('studentM.store');
            Route::get('edit/{masv}', [StudentMController::class, 'show'])->name('studentM.edit');
            Route::put('edit/{masv}', [StudentMController::class, 'update'])->name('studentM.update');
            Route::delete('destroy/{masv}', [StudentMController::class, 'destroy'])->name('studentM.destroy');
        });
        // Giảng viên
        Route::prefix('teacherM')->group(function () {
            Route::get('list', [TeacherMController::class, 'index'])->name('teacherM.list');
            Route::post('add', [TeacherMController::class, 'store'])->name('teacherM.store');
            Route::get('edit/{magv}', [TeacherMController::class, 'show'])->name('teacherM.edit');
            Route::put('edit/{magv}', [TeacherMController::class, 'update'])->name('teacherM.update');
            Route::delete('destroy/{magv}', [TeacherMController::class, 'destroy'])->name('teacherM.destroy');
        });
        // Môn học
        Route::prefix('subjects')->group(function () {
            Route::get('list', [SubjectsController::class, 'index'])->name('subjects.list');
            Route::post('add', [SubjectsController::class, 'store'])->name('subjects.store');
            Route::get('edit/{mamh}', [SubjectsController::class, 'show'])->name('subjects.edit');
            Route::put('edit/{mamh}', [SubjectsController::class, 'update'])->name('subjects.update');
            Route::delete('destroy/{mamh}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');
        });
        // Học kỳ
        Route::prefix('semester')->group(function () {
            Route::get('list', [SemesterController::class, 'index'])->name('semester.list');
            Route::post('add', [SemesterController::class, 'store'])->name('semester.store');
            Route::get('edit/{namhoc}/{hocky}', [SemesterController::class, 'show'])->name('semester.edit');
            Route::put('edit/{namhoc}/{hocky}', [SemesterController::class, 'update'])->name('semester.update');
            Route::delete('destroy/{namhoc}/{hocky}', [SemesterController::class, 'destroy'])->name('semester.destroy');
        });
        // Phòng học
        Route::prefix('room')->group(function () {
            Route::get('list', [RoomController::class, 'index'])->name('room.list');
            Route::post('add', [RoomController::class, 'store'])->name('room.store');
            Route::get('edit/{maphong}', [RoomController::class, 'show'])->name('room.edit');
            Route::put('edit/{maphong}', [RoomController::class, 'update'])->name('room.update');
            Route::delete('destroy/{maphong}', [RoomController::class, 'destroy'])->name('room.destroy');
        });
        // Ca học
        Route::prefix('lesson')->group(function () {
            Route::get('list', [LessonController::class, 'index'])->name('lesson.list');
            Route::post('add', [LessonController::class, 'store'])->name('lesson.store');
            Route::get('edit/{macahoc}', [LessonController::class, 'show'])->name('lesson.edit');
            Route::put('edit/{macahoc}', [LessonController::class, 'update'])->name('lesson.update');
            Route::delete('destroy/{macahoc}', [LessonController::class, 'destroy'])->name('lesson.destroy');
        });
        // Học phần
        Route::prefix('term')->group(function () {
            Route::get('list', [TermController::class, 'index'])->name('term.list');
            Route::post('add', [TermController::class, 'store'])->name('term.store');
            Route::get('edit/{mahp}', [TermController::class, 'show'])->name('term.edit');
            Route::put('edit/{mahp}', [TermController::class, 'update'])->name('term.update');
            Route::delete('destroy/{mahp}', [TermController::class, 'destroy'])->name('term.destroy');
            Route::get('semester/{namhoc}', [TermController::class, 'getsemester'])->name('term.getSemester');
        });
        // Lịch
        Route::prefix('schedule')->group(function () {
            Route::get('list', [ScheduleController::class, 'index'])->name('schedule.list');
            Route::post('add', [ScheduleController::class, 'store'])->name('schedule.store');
            Route::get('edit/{mahp_id}/{tuan}', [ScheduleController::class, 'show'])->name('schedule.edit');
            Route::put('edit/{mahp_id}/{tuan}', [ScheduleController::class, 'update'])->name('schedule.update');
            Route::delete('destroy/{mahp_id}/{tuan}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
        });
        // Điểm danh
        Route::prefix('attendance')->group(function () {
            Route::get('list', [AttendanceController::class, 'index'])->name('attendance.list');
            Route::post('add', [AttendanceController::class, 'store'])->name('attendance.store');
            Route::get('edit/{mahp}/{masv}', [AttendanceController::class, 'show'])->name('attendance.edit');
            Route::put('edit/{mahp}/{masv}', [AttendanceController::class, 'update'])->name('attendance.update');
            Route::delete('destroy/{mahp}/{masv}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
        });
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
