<?php

namespace App\Exports;

use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class ScoreStudentExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $period;
    protected $grade;
    protected $id;

    public function __construct(Grade $grade, Period $period, int $id)
    {
        $this->period = $period;
        $this->grade = $grade;
        $this->id = $id;
    }

    public function view(): View
    {
        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->where('id', $this->id)
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

        $period = $this->period;
        $grade = $this->grade;

        return view('excel.score-student', compact('students', 'courses', 'grade', 'period'));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Obtener el número total de filas
                $lastRow = $sheet->getHighestRow();

                // Iterar sobre las filas de la hoja de cálculo en reversa
                for ($row = $lastRow; $row >= 1; $row--) {
                    // Verificar si la fila está completamente vacía
                    $isEmptyRow = true;
                    for ($col = 'A'; $col <= 'Z'; $col++) {
                        if (!empty($sheet->getCell($col . $row)->getValue())) {
                            $isEmptyRow = false;
                            break;
                        }
                    }

                    // Si la fila está completamente vacía, eliminarla
                    if ($isEmptyRow) {
                        $sheet->getRowDimension($row)->setVisible(false);
                        $sheet->getRowDimension($row)->setCollapsed(true);
                    }
                }
            },
        ];
    }
}
