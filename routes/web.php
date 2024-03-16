<?php

use App\Http\Controllers\addHomeworkScoreController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HomeworkGradeController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachingAssignmentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/homework-grades', [HomeworkGradeController::class, 'groupHomeworksGrades'])->name('homeworks.groupHomeworksGrades');
    Route::get('/homework-grades/{grade_id}', [HomeworkGradeController::class, 'viewHomeworks'])->name('homeworks.viewHomeworksGrades');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', UserController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/grades', GradeController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource('/classes', ClassController::class);
    Route::resource('/periods', PeriodController::class);
    Route::resource('/assignments', TeachingAssignmentsController::class);
    Route::resource('/class-students', ClassStudentController::class);
    Route::post('/class-students/add-more-students', [ClassStudentController::class, 'addMoreStudents'])->name('class-students.addMoreStudents');
    Route::resource('/homeworks', HomeworkController::class);
    Route::resource('/attendance', AttendanceController::class)->except(['edit', 'update']);
    Route::get('/attendance/{class_id}/register', [AttendanceController::class, 'register'])->name('attendance.register');
    Route::post('/attendance/{class_id}/register', [AttendanceController::class, 'addRegister'])->name('attendance.addRegister');
    Route::get('/attendance/{class_id}/select-date', [AttendanceController::class, 'selectDatetoEdit'])->name('attendance.selectDate');
    Route::patch('/attendance/{class_id}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::get('/attendance/{class_id}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::resource('/add-homeworks-score', addHomeworkScoreController::class)->except('store');
    Route::get('/add-homeworks-score/{homework_id}/{assigment_id}', [addHomeworkScoreController::class, 'homeworkRegister'])->name('homework.register');
    Route::post('/add-homeworks-score/{homework_id}/{assigment_id}', [addHomeworkScoreController::class, 'store'])->name('add-homeworks-score.store');

});

require __DIR__.'/auth.php';
