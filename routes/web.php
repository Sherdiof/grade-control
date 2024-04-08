<?php

use App\Http\Controllers\addHomeworkScoreController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Chart1Controller;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HomeworkGradeController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreReportCourseController;
use App\Http\Controllers\scoreReportsController;
use App\Http\Controllers\ScoreReportStudentController;
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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ DashboardController::class, 'index'])->name('dashboard');
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

    Route::resource('/attendance', AttendanceController::class)->except(['edit', 'update', 'show']);
    Route::get('/attendance/{grade}/grade', [AttendanceController::class, 'selectGrade'])->name('attendance.grade');
    Route::get('/attendance/{grade}/grade/{class}/register', [AttendanceController::class, 'register'])->name('attendance.register');
    Route::post('/attendance/{grade}/grade/{class}/register', [AttendanceController::class, 'addRegister'])->name('attendance.addRegister');
    Route::get('/attendance/{class}/select-date-to-show', [AttendanceController::class, 'selectDatetoShow'])->name('attendance.selectDatetoShow');
    Route::get('/attendance/{class}/show', [AttendanceController::class, 'show'])->name('attendance.show');
    Route::patch('/attendance/{grade}/grade/{class}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::get('/attendance/{grade}/grade/{class}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::get('/attendance/{grade}/grade/{class}/select-date', [AttendanceController::class, 'selectDatetoEdit'])->name('attendance.selectDate');


    Route::resource('/add-homeworks-score', addHomeworkScoreController::class)->except(['store', 'edit']);
    Route::get('/add-homeworks-score/{homework_id}/{assigment_id}', [addHomeworkScoreController::class, 'homeworkRegister'])->name('homework.register');
    Route::post('/add-homeworks-score/{homework_id}/{assigment_id}', [addHomeworkScoreController::class, 'store'])->name('add-homeworks-score.store');
    Route::patch('/add-homeworks-score/{homework_id}/{assigment_id}', [addHomeworkScoreController::class, 'update'])->name('add-homeworks-score.update');
    Route::get('/add-homeworks-score/{homework_id}/{assigment_id}/edit', [addHomeworkScoreController::class, 'edit'])->name('add-homeworks-score.edit');

    Route::get('/score-reports', [scoreReportsController::class, 'index'])->name('scoreReports.index');
    Route::get('/score-reports/{grade}/score-grade', [scoreReportsController::class, 'period'])->name('scoreReports.period');
    Route::get('/score-reports/{grade}/score-grade/{period}/period', [scoreReportsController::class, 'scoreGrade'])->name('scoreReports.scoreGrade');
    Route::get('/score-reports/{grade}/{period}/statistics', [scoreReportsController::class, 'statistics'])->name('scoreReports.statistics');

    Route::get('/score-reports-students', [ScoreReportStudentController::class, 'index'])->name('scoreReportsStudents.index');
    Route::get('/score-reports-students/{grade}/period', [ScoreReportStudentController::class, 'period'])->name('scoreReportsStudents.period');
    Route::get('/score-reports-students/{grade}/grade/{period}/period', [ScoreReportStudentController::class, 'selectStudent'])->name('scoreReportsStudents.select-student');
    Route::get('/score-reports-students/{grade}/grade/{period}/period/{student}/student', [ScoreReportStudentController::class, 'scoreStudent'])->name('scoreReportsStudents.score-student');

    Route::get('/score-reports-course', [ScoreReportCourseController::class, 'index'])->name('scoreReportsCourse.index');
    Route::get('/score-reports-course/{grade}/grade', [ScoreReportCourseController::class, 'courses'])->name('scoreReportsCourse.course');
    Route::get('/score-reports-course/{grade}/grade/{course}/course', [ScoreReportCourseController::class, 'period'])->name('scoreReportsCourse.period');
    Route::get('/score-reports-course/{grade}/grade/{course}/course/{period}/period', [ScoreReportCourseController::class, 'scoreCourse'])->name('scoreReportsCourse.score-course');

    Route::get('/export-score-grade/{grade}/{period}', [scoreReportsController::class, 'exportExcel'])->name('scoreReports.excel');
    Route::get('/export-score-student/{grade}/{period}/{student}', [ScoreReportStudentController::class, 'exportExcel'])->name('scoreReportsStudents.excel');
    Route::get('/export--pdf-student/{grade}/{period}/{student}', [ScoreReportStudentController::class, 'exportPDF'])->name('scoreReportsStudents.pdf');
    Route::get('/export-score-course/{grade}/{course}/{period}', [ScoreReportCourseController::class, 'exportExcel'])->name('scoreReportsCourse.excel');


    Route::get('/chart-1/grades', [ Chart1Controller::class, 'chartGrades'])->name('chart1.index');
    Route::get('/chart-1/teacher', [ Chart1Controller::class, 'chartTeachers'])->name('chart1.index');
});

require __DIR__.'/auth.php';
