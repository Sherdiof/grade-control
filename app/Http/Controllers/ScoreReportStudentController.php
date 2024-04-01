<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Http\Request;

class ScoreReportStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('score-reports-students.index', compact('grades'));
    }

    public function period(Grade $grade)
    {
        $periods = Period::all();
        return view('score-reports-students.period', compact('grade', 'periods'));
    }

    public function selectStudent(Grade $grade, Period $period)
    {
        $students = Student::with(['classtudent.class'])
            ->whereHas('classtudent.class', function ($query) use ($grade) {
                $query->where('grade_id', $grade->id);
            })
            ->get()
            ->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'section' => $student->classtudent->class->name,
                ];
            });
//        return response()->json($students);
        return view('score-reports-students.student', compact('grade', 'students', 'period'));
    }

    public function scoreStudent(Grade $grade, Period $period, int $id)
    {
        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->where('id', $id)
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
                    'course' => $studentHomework->homework->assigment->course->name,
                    'section' => $student->classtudent->class->name,
                    'scores' => $coursesScores,
                    'average' => $average,
                ];
            });

        $courses = [];
        foreach ($students as $student) {
            if (!empty($student['scores'])) {
                $aux = array_keys($student['scores']);
                $courses = array_merge($courses, $aux);
            }
        }

        $courses = array_unique($courses);

        $informationStudent = Student::find($id);

//        return response()->json($students);
        return view('score-reports-students.score-student', compact('students', 'courses', 'grade', 'period', 'informationStudent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
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
