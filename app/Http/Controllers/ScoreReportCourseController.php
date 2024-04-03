<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Http\Request;

class ScoreReportCourseController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('score-reports-courses.index', compact('grades'));
    }

    public function courses(Grade $grade)
    {
        $courses = Assigment::where('grade_id', $grade->id)->get();
        return view('score-reports-courses.course', compact('grade', 'courses'));
    }

    public function period(Grade $grade, Course $course)
    {
        $periods = Period::all();
        return view('score-reports-courses.period', compact('grade', 'course', 'periods'));
    }

    public function scoreCourse(Grade $grade, Course $course, Period $period)
    {
        $assigment = Assigment::where('grade_id', $grade->id)->where('course_id', $course->id)->get();

        $students = Student::with(['studentHomework.homework', 'classtudent.class'])
            ->whereHas('studentHomework.homework', function ($query) use ($period, $assigment) {
                $query->where('period_id', $period->id)
                    ->where('assigment_id', $assigment[0]->id);
            })
            ->whereHas('studentHomework.homework.assigment', function ($query) use ($grade, $course) {
                $query->where('grade_id', $grade->id)
                    ->where('course_id', $course->id);
            })
            ->get()
            ->map(function ($student) use ($course, $grade) {
                $homeworksScores = [];
                $totalScore = 0;
                foreach ($student->studentHomework as $studentHomework) {
                    if ($studentHomework->homework->assigment->grade_id == $grade->id and $studentHomework->homework->assigment->course_id == $course->id) {
                        $score = $studentHomework->score;
                        $homeworkName = $studentHomework->homework->name;

                        $homeworksScores[$homeworkName] = $score;
                        $totalScore += $score;
                    }
                }

                return [
                    'name' => $student->name,
                    'section' => $student->classtudent->class->name,
                    'scores' => $homeworksScores,
                    'totalScore' => $totalScore
                ];
            });

        $homeworks = [];
        foreach ($students as $student){
            if (!empty($student['scores'])){
                $aux = array_keys($student['scores']);
                $homeworks = array_merge($homeworks, $aux);
            }
        }

        $homeworks = array_unique($homeworks);

//        return response()->json($homeworks);
        return view('score-reports-courses.score-course', compact('grade', 'course', 'period', 'students', 'homeworks'));
    }

}
