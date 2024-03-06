<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\ClassStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
        $classStudents = ClassStudent::select('class_students.class_id', DB::raw('CONCAT("sección ", classes.name, " - ", grades.name) AS nameGrade'), DB::raw('COUNT(students.id) as cantidad'))
            ->join('classes', 'class_students.class_id', '=', 'classes.id')
            ->join('students', 'class_students.student_id', '=', 'students.id')
            ->join('grades', 'classes.grade_id', '=', 'grades.id')
            ->where('grades.name', 'like', '%' . $search . '%')
            ->groupBy('nameGrade', 'class_students.class_id')
            ->paginate(10);

        return view('attendances.index', compact('classStudents', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(int $class_id)
    {
        $classStudents = ClassStudent::where('class_id', $class_id)->join('students', 'class_students.student_id', '=', 'students.id')
            ->select('students.name as student', 'class_students.id', 'students.id as student_id')->get();
        return view('attendances.register', compact('classStudents', 'class_id'));
    }

    public function addRegister(Request $request)
    {
        $assist = $request->assist;
        $class = $request->class_id;
        $student = $request->student_id;
        $c = count($request['student_id']);
        for ( $i = 0; $i<$c; $i++){
            Attendance::create([
                'class_id' => $class[$i],
                'student_id' => $student[$i],
                'attendance_class' => $assist[$i],
                'date' => Carbon::parse()->timezone('CST')
            ]);
        }

        return redirect()->route('attendance.index');
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
