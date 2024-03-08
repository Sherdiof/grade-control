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
    public function register(int $class_id, string $date)
    {
        $classStudents = ClassStudent::where('class_id', $class_id)->join('students', 'class_students.student_id', '=', 'students.id')
            ->select('students.name as student', 'class_students.id', 'students.id as student_id')->get();
        return view('attendances.register', compact('classStudents', 'class_id', 'date'));
    }

    public function addRegister(Request $request)
    {
        $assist = $request->assist;
        $class = $request->class_id;
        $student = $request->student_id;
        $c = count($request['student_id']);
        for ($i = 0; $i < $c; $i++) {
            Attendance::create([
                'class_id' => $class[$i],
                'student_id' => $student[$i],
                'attendance_class' => $assist[$i],
                'date' => $request->date
            ]);
        }

        return redirect()->route('attendance.index')->with('status', 'Se ha registrado la asistencia correctamente!');
    }

    public function selectDatetoEdit(int $class_id)
    {
        $class = Classes::find($class_id);
        return view('attendances.select-date', compact('class', 'class_id'));
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
    public function edit(int $class_id, Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $attendances = Attendance::where('class_id', $class_id)->where('date', $date)->get();
        if (count($attendances) != 0) {
            return view('attendances.edit', compact('attendances', 'date', 'class_id'));
        } else {
            return $this->register($class_id, $date);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $class_id)
    {
        $assist = $request->assist;
        $attendance = $request->attendance_id;
        $c = count($request['attendance_id']);
        for ($i = 0; $i < $c; $i++) {
            $data = Attendance::find($attendance[$i]);
            $data->attendance_class = $assist[$i];
            $data->save();
        }

        return redirect()->route('attendance.index')->with('status', 'Se han actualiado los registros correctamente!');
    }
}
