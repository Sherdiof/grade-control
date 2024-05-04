<?php

namespace App\Http\Controllers;

use App\Exports\ScoreGradesExport;
use App\Exports\ScoreStudentExport;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\isEmpty;

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
        $periods = Period::all()->where('status', '=', 'ACTIVO');
        return view('score-reports-students.period', compact('grade', 'periods'));
    }

    public function selectStudent(Grade $grade, string $period)
    {
        $students = Student::with(['classtudent.class'])
            ->whereHas('classtudent.class', function ($query) use ($grade) {
                $query->where('grade_id', $grade->id);
            })
            ->where('status', '=', 'ACTIVO')
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

    public function scoreStudent(Grade $grade, string $period, int $id)
    {
//        $periodID = '';
        if ($period == 'promedio-general') {
//            return $this->anualAverage($grade, $period, $id);
            $periodInfo = '';
        } else {
            $periodInfo = Period::find($period);
            $periodID = $periodInfo['id'];
        }
//        dd($periodInfo);
        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->where('id', $id)
//            ->whereHas('studentHomework.homework', function ($query) use ($period) {
//                if ($period != 'promedio-general'){
//                    $query->where('period_id', $period);
//                }
//            })
            ->whereHas('studentHomework.homework.assigment', function ($query) use ($grade) {
                $query->where('grade_id', $grade->id);
            })
            ->where('status', '=', 'ACTIVO')
            ->get()
            ->map(function ($student) use ($periodInfo, $period) {
                if (isset($periodInfo)) {
                    $periodID = $periodInfo['id'];
                }
                $coursesScores = [];
                $totalCourses = 0;
                $average = 0;
                $totalScore = 0;
                $totalCoursesScore = 0;
                $qtyPeriods = Period::where('status', '=', 'ACTIVO')->count();
                foreach ($student->studentHomework as $studentHomework) {
                    $score = $studentHomework->score;
                    $courseName = $studentHomework->homework->assigment->course->name;


                    // Agregas la condición aquí
//                    if (isset($periodID)){
                        if ($studentHomework->homework->period_id ==  $periodID) {
                            if (!isset($coursesScores[$courseName])) {
                                $coursesScores[$courseName] = 0;
                                $totalCourses++;
                            }

                            $coursesScores[$courseName] += $score;
                            $totalScore += $score;

                            $average = $totalCourses > 0 ? $totalScore / $totalCourses : 0;
                        } else {

                        }
//                    }
                    if ($period == 'promedio-general') {
                        if (!isset($coursesScores[$courseName])) {
                            $coursesScores[$courseName] = 0;
                            $totalCourses++;
                        }

                        $coursesScores[$courseName] += $score;
                        $totalScore += $score;

                        $coursesScores[$courseName] = $totalScore / $qtyPeriods;
                        $totalCoursesScore = array_sum($coursesScores);
                        $average = $totalCourses > 0 ? $totalCoursesScore / $totalCourses : 0;
                    }
                }


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
        return view('score-reports-students.score-student', compact('students', 'courses', 'grade', 'period', 'periodInfo', 'informationStudent'));
    }

    public function anualAverage(Grade $grade, string $period, int $id) {

        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->where('id', $id)
            ->whereHas('studentHomework.homework', function ($query) use ($period) {
                if ($period != 'promedio-general'){
                    $query->where('period_id', $period);
                }
            })
            ->whereHas('studentHomework.homework.assigment', function ($query) use ($grade) {
                $query->where('grade_id', $grade->id);
            })
            ->where('status', '=', 'ACTIVO')
            ->get()
            ->map(function ($student){
                $courseData = [];
                foreach ($student->studentHomework as $studentHomework) {
                    $courseName = $studentHomework->homework->assigment->course->name;
                    $score = $studentHomework->score;
                    $periodNumber = $studentHomework->homework->period->name;

                    // Agregar el score al curso y período correspondientes
                    $courseData[$courseName][$periodNumber] = $score;
                    $courseData[$courseName]["promediocurso"] = 0; // Inicializar promedio

                    // Calcular el promedio del curso
                    $totalScores = array_sum($courseData[$courseName]);
                    $numPeriods = count($courseData[$courseName]) - 1; // Excluir el promedio
                    if ($numPeriods > 0) {
                        $courseData[$courseName]["promediocurso"] = $totalScores / $numPeriods;
                    }
                }

                return $courseData;
            });

        return response()->json($students);
    }

    public function exportExcel(Grade $grade, string $period, int $id)
    {
        $student = Student::find($id);

        $export = new ScoreStudentExport($grade, $period, $id);

        return Excel::download($export, strtoupper($student->name) . '-' . $grade->name . '-' . $period->name . '-' . $period->year .'.xlsx');
    }

    public function exportPDF(Grade $grade, Period $period, int $id)
    {
        $students = Student::with(['studentHomework.homework.assigment.course', 'studentHomework.homework.period', 'classtudent.class'])
            ->where('id', $id)
            ->whereHas('studentHomework.homework', function ($query) use ($period) {
                $query->where('period_id', $period->id);
            })
            ->whereHas('studentHomework.homework.assigment', function ($query) use ($grade) {
                $query->where('grade_id', $grade->id);
            })
            ->get();

        // Estructura de datos para pasar a la vista
        $data = [];
        foreach ($students as $student) {
            $studentData = [
                'name' => $student->name,
                'class' => $student->classtudent->class->name,
                'scores' => [],
                'average' => 0,
            ];

            $totalCourses = 0;
            $totalScore = 0;

            foreach ($student->studentHomework as $studentHomework) {
                $score = $studentHomework->score;
                $courseName = $studentHomework->homework->assigment->course->name;

                if (!isset($studentData['scores'][$courseName])) {
                    $studentData['scores'][$courseName] = $score;
                    $totalCourses++;
                }

                $totalScore += $score;
            }

            $studentData['average'] = $totalCourses > 0 ? $totalScore / $totalCourses : 0;

            $data[] = $studentData;
        }

        // Obtener la lista de cursos
        $courses = [];
        foreach ($students as $student) {
            foreach ($student->studentHomework as $studentHomework) {
                $courseName = $studentHomework->homework->assigment->course->name;
                $courses[$courseName] = $courseName;
            }
        }

        $informationStudent = Student::find($id);

//        return response()->json($data);

        $pdf = PDF::loadView('pdf.score-student', [
            'students' => $data,
            'period' => $period,
            'grade' => $grade,
            'informationStudent' => $informationStudent,
            'courses' => $courses
        ]);

        $dataStudent = Student::find($id);

        return $pdf->download(strtoupper($dataStudent->name) . '-' . strtoupper($grade->name) . '-' . strtoupper($dataStudent->classtudent->class->name) . '-' . strtoupper($period->name) . '-' . strtoupper($period->year) .'.pdf');
    }
}
