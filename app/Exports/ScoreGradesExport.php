<?php

namespace App\Exports;

use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ScoreGradesExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $period;
    protected $grade;

    public function __construct(Period $period, Grade $grade)
    {
        $this->period = $period;
        $this->grade = $grade;
    }

    public function view(): View
    {
        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->whereHas('studentHomework.homework', function ($query) {
                $query->where('period_id', $this->period->id);
            })
            ->whereHas('studentHomework.homework.assigment', function ($query) {
                $query->where('grade_id', $this->grade->id);
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

        $period = $this->period;
        $grade = $this->grade;

//        dd(json_encode($students));
        return view('excel.score-grade', compact('students', 'courses', 'grade', 'period'));
    }
}
