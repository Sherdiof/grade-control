<?php

namespace App\Exports;

use App\Models\Assigment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ScoreCourseExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $period;
    protected $grade;
    protected $course;

    public function __construct(Grade $grade, Course $course, Period $period)
    {
        $this->grade = $grade;
        $this->course = $course;
        $this->period = $period;
    }

    public function view(): View
    {
        $assigment = Assigment::where('grade_id', $this->grade->id)->where('course_id', $this->course->id)->get();

        $students = Student::with(['studentHomework.homework', 'classtudent.class'])
            ->whereHas('studentHomework.homework', function ($query) use ($assigment) {
                $query->where('period_id', $this->period->id)
                    ->where('assigment_id', $assigment[0]->id);
            })
            ->whereHas('studentHomework.homework.assigment', function ($query) {
                $query->where('grade_id', $this->grade->id)
                    ->where('course_id', $this->course->id);
            })
            ->get()
            ->map(function ($student) {
                $homeworksScores = [];
                $totalScore = 0;
                foreach ($student->studentHomework as $studentHomework) {
                    if ($studentHomework->homework->assigment->grade_id == $this->grade->id and $studentHomework->homework->assigment->course_id == $this->course->id) {
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

        $period = $this->period;
        $grade = $this->grade;
        $course = $this->course;

        return view('excel.score-course', compact('grade', 'course', 'period', 'students', 'homeworks'));
    }
}
