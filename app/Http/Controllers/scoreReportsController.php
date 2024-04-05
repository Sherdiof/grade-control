<?php

namespace App\Http\Controllers;

use App\Exports\ScoreGradesExport;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class scoreReportsController extends Controller
{
    public function index()
    {
//        $classes = Classes::select('grade.id as grade_id', 'classes.name as class', 'g.name as grade')
//            ->join('grades as g', 'classes.grade_id', '=', 'g.id')
//            ->get();

        $grades = Grade::all();

        return view('score-reports.index', compact('grades'));
    }

    public function scoreGrade(Grade $grade, Period $period)
    {
        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->whereHas('studentHomework.homework', function ($query) use ($period) {
                $query->where('period_id', $period->id);
            })
            ->whereHas('studentHomework.homework.assigment', function ($query) use ($grade) {
                $query->where('grade_id', $grade->id);
            })
            ->get()
            ->map(function ($student) {
                $coursesScores = [];
                $totalCourses = 0;
                $totalScore = 0;
                foreach ($student->studentHomework as $studentHomework) {
                    $score = $studentHomework->score;
                    $courseName = $studentHomework->homework->assigment->course->name;

                    // Agregas la condición aquí
//                    if ($studentHomework->homework->period_id === 3) {
                        if (!isset($coursesScores[$courseName])) {
                            $coursesScores[$courseName] = 0;
                            $totalCourses++;
                        }

                        $coursesScores[$courseName] += $score;
                        $totalScore += $score;
//                    }
                }

                $average = $totalCourses > 0 ? $totalScore / $totalCourses : 0;

                return [
                    'name' => $student->name,
                    'section' => $student->classtudent->class->name,
                    'scores' => $coursesScores,
                    'average' => $average,
                ];
            });

        $courses = [];
        foreach ($students as $student){
            if (!empty($student['scores'])){
                $aux = array_keys($student['scores']);
                $courses = array_merge($courses, $aux);
            }
        }

        $courses = array_unique($courses);
        //return response()->json($students);

        return view('score-reports.score-grade', compact('students', 'courses', 'grade', 'period'));
    }

    public function period(string $grade)
    {
        $periods = Period::all();
        return view('score-reports.period', compact('grade', 'periods'));
    }

    public function exportExcel(Grade $grade, Period $period)
    {
        $export = new ScoreGradesExport($period, $grade);

        return Excel::download($export, $grade->name . '-' . $period->name . '-' . $period->year . '.xlsx');
    }
}
