<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class scoreReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $classes = Classes::select('grade.id as grade_id', 'classes.name as class', 'g.name as grade')
//            ->join('grades as g', 'classes.grade_id', '=', 'g.id')
//            ->get();

        $grades = Grade::all();

        return view('score-reports.index', compact('grades'));
    }

/**
 * Show the form for creating a new resource.
 */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function period(string $grade)
    {
        $periods = Period::all();
        return view('score-reports.period', compact('grade', 'periods'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
