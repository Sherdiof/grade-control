<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Homeworks;
use App\Models\Student;
use App\Models\StudentHomeworks;
use Illuminate\Http\Request;

class addHomeworkScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homeworkRegister(int $homework, int $assigment)
    {
        $exist = StudentHomeworks::where('homeworks_id', $homework)->get();

        if (count($exist) != 0) {
            return $this->edit($homework, $assigment);
        } else {
            $homeworkStudents = Assigment::query()
                ->select('s.name as estudiante', 'c.name as seccion', 'g.name as grado', 's.id as student_id')
                ->join('grades as g', 'assigments.grade_id', '=', 'g.id')
                ->join('classes as c', 'c.grade_id', '=', 'g.id')
                ->join('class_students as cs', 'c.id', '=', 'cs.class_id')
                ->join('students as s', 'cs.student_id', '=', 's.id')
                ->where('assigments.id', $assigment)
                ->get();

            $homeworkScore = Homeworks::find($homework);
            return view('add-homeworks-score.create', compact('homeworkScore', 'homeworkStudents'));
        }
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
        $this->validate($request, [
            'score' => ['required', 'max:10'],
        ]);
        $score = $request->score;
        $student = $request->student_id;
        $c = count($request->score);

        for ($i = 0; $i < $c; $i++) {
        StudentHomeworks::create([
            'score' => $score[$i],
            'student_id' => $student[$i],
            'homeworks_id' => $request->homework
        ]);
        }

        return redirect()->back()->with('status', 'Se ha creado el registro correctamente!');
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
    public function edit(int $homework, int $assigment)
    {
        $homeworkStudents = Assigment::select('students.name as estudiante', 'classes.name as seccion', 'grades.name as grado', 'student_homeworks.score', 'students.id as student_id')
            ->join('grades', 'assigments.grade_id', '=', 'grades.id')
            ->join('classes', 'grades.id', '=', 'classes.grade_id')
            ->join('class_students', 'classes.id', '=', 'class_students.class_id')
            ->join('students', 'class_students.student_id', '=', 'students.id')
            ->join('student_homeworks', 'students.id', '=', 'student_homeworks.student_id')
            ->join('homeworks', 'student_homeworks.homeworks_id', '=', 'homeworks.id')
            ->where('assigments.id', '=', $assigment)
            ->where('homeworks.id', '=', $homework)
            ->get();

        $homeworkScore = Homeworks::find($homework);
        return view('add-homeworks-score.edit', compact('homeworkScore', 'homeworkStudents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $homework, int $assigment)
    {
        $this->validate($request, [
            'score' => ['required', 'max:10'],
        ]);

        $students = $request->student_id;
        $scores = $request->score;
        $c = count($students);
        for ($i = 0; $i<$c ; $i++) {
            $student = StudentHomeworks::where('student_id', $students[$i])->where('homeworks_id', $homework)->first();
            $student->score = $scores[$i];
            $student->save();
        }

        return redirect()->back()->with('status', 'Se ha actualizado el registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
