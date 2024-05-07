<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Grade;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
//        $classStudents = ClassStudent::select('class_students.class_id', DB::raw('CONCAT("sección ", classes.name, " - ", grades.name) AS nameGrade'), DB::raw('COUNT(students.id) as cantidad'))
//            ->join('classes', 'class_students.class_id', '=', 'classes.id')
//            ->join('students', 'class_students.student_id', '=', 'students.id')
//            ->join('grades', 'classes.grade_id', '=', 'grades.id')
//            ->where('grades.name', 'like', '%' . $search . '%')
//            ->groupBy('nameGrade', 'class_students.class_id')
//            ->paginate(10);

        if (auth()->user()->role == 'Admin') {
            $grades = Grade::paginate(10);
        } else {
            $grades = Grade::with('assigments')
                ->whereHas('assigments', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->where('name', 'like', '%' . $search . '%')
                ->paginate(10);
        }

        return view('attendances.index', compact( 'search', 'grades'));
    }

    public function selectGrade(Grade $grade)
    {
        $classes = Classes::where('grade_id', $grade->id)->get();
        return view('attendances.select-grade', compact('grade', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Classes $class, Grade $grade, string $date)
    {
        $classStudents = ClassStudent::where('class_id', $class->id)->join('students', 'class_students.student_id', '=', 'students.id')
            ->select('students.name as student', 'class_students.id', 'students.id as student_id')->get();
        return view('attendances.register', compact('classStudents', 'class', 'grade', 'date'));
    }

    public function addRegister(Grade $grade, Classes $class, Request $request)
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

        return redirect()->route('attendance.grade', $grade->id)->with('status', 'Se ha registrado la asistencia correctamente!');
    }

    public function selectDatetoEdit(Grade $grade, Classes $class)
    {
        return view('attendances.select-date', compact('class', 'grade'));
    }

    /**
     * Display the specified resource.
     */
    public function selectDatetoShow(Grade $grade, Classes $class)
    {
        return view('attendances.select-date-to-show', compact('class', 'grade'));
    }

    public function show(Grade $grade, Classes $class, Request $request)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required'
        ]);

        $start = Carbon::parse($request->start)->format('Y-m-d');
        $end = Carbon::parse($request->end)->format('Y-m-d');
        $students = Student::with(['attendances' => function ($query) use ($class, $start, $end) {
            $query->where('class_id', $class->id)
                ->whereBetween('date', [$start, $end])
                ->orderBy('date');
        }, 'classtudent.class'])->whereHas('attendances', function ($query) use ($class, $start, $end) {
            $query->where('class_id', $class->id)
                ->whereBetween('date', [$start, $end])
                ->orderBy('date');
        })
            ->get()
            ->map(function ($student) {
                $attendanceDescription = [];
                $assist = 0;
                $notAssist = 0;
                foreach ($student->attendances as $attendance) {
                    $date = $attendance->date;
                    $attendanceDescription[$date] = $attendance->attendance_class;

                    if ($attendance->attendance_class == 'Assist') {
                        $assist++;
                    } else {
                        $notAssist++;
                    }
                }

                return [
                    'name' => $student->name,
                    'section' => $student->classtudent->class->name,
                    'attendance' => $attendanceDescription,
                    'assist' => $assist,
                    'noAssist' => $notAssist
                ];
            });

        $dates = [];
        foreach ($students as $student){
            if (!empty($student['attendance'])){
                $aux = array_keys($student['attendance']);
                $dates = array_merge($dates, $aux);
            }
        }

        $dates = array_unique($dates);

//        return response()->json($dates);
        return view('attendances.show', compact('students','dates','class', 'start', 'end', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade, Classes $class,  Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $attendances = Attendance::where('class_id', $class->id)->where('date', $date)->get();
        if (count($attendances) != 0) {
            return view('attendances.edit', compact('attendances', 'date', 'class', 'grade'));
        } else {
            return $this->register($class, $grade, $date);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Grade $grade, Classes $class, Request $request )
    {
        $assist = $request->assist;
        $attendance = $request->attendance_id;
        $c = count($request['attendance_id']);
        for ($i = 0; $i < $c; $i++) {
            $data = Attendance::find($attendance[$i]);
            $data->attendance_class = $assist[$i];
            $data->save();
        }
        return redirect()->route('attendance.grade', $grade->id)->with('status', 'Se han actualiado los registros correctamente!');
    }

    public function exportExcel(Classes $class, string $start, string $end)
    {
        $export = new AttendanceExport($class, $start, $end);

        return Excel::download($export, $class->grade->name . '-' . $class->name .'-ATTENDANCE.xlsx');
    }


}
