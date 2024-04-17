<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Rules\DoesntExistsClassStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classStudents = ClassStudent::join('classes', 'class_students.class_id', '=', 'classes.id')
            ->join('students', 'class_students.student_id', '=', 'students.id')
            ->join('grades', 'classes.grade_id', '=', 'grades.id')
            ->select('class_students.class_id', DB::raw('CONCAT(grades.name , " - ", "SECCIÓN ", classes.name ) as class_grade'), DB::raw('COUNT(students.id) as qty'))
            ->groupBy('class_students.class_id', 'class_grade')
            ->get();
        return view('class-students.index', compact('classStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        $students = Student::all();
        return view('class-students.create', compact('classes', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required'
        ]);
        foreach ($request->input('student_id')  as $student) {
            ClassStudent::create([
                'class_id' => $request->class_id,
                'student_id' => $student
            ]);
        }

        return redirect()->route('class-students.index')->with('status', 'Se han creado los registros correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classStudents = ClassStudent::where('class_id', $id)->join('students', 'class_students.student_id', '=', 'students.id')
            ->select('students.name as student', 'students.status as status', 'class_students.id')->get();
        $class = Classes::find($id);
        return view('class-students.show', compact('classStudents', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $classes = Classes::all();
        $students = Student::all();
        $classStudents = ClassStudent::where('class_id', $id)->join('students', 'class_students.student_id', '=', 'students.id')
                            ->select('students.name as student', 'class_students.id')->get();
        $class = Classes::find($id);
        return view('class-students.edit', compact('classes', 'students', 'classStudents', 'class'));
    }

    public function addMoreStudents(Request $request)
    {
        $request->validate([
            'student_id.*' => new DoesntExistsClassStudents($request->input('class_id')),
        ]);
        foreach ($request->input('student_id')  as $student) {
            ClassStudent::create([
                'class_id' => $request->class_id,
                'student_id' => $student
            ]);
        }
        return redirect()->route('class-students.index')->with('status', 'Se ha agregado datos al grado y sección correctamente.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
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
