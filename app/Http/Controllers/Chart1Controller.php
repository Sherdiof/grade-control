<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Chart1Controller extends Controller
{

    public function chartGrades()
    {
        $grades = Student::join('class_students', 'students.id', '=', 'class_students.student_id')
                ->join('classes', 'class_students.class_id', '=', 'classes.id')
                ->join('grades', 'classes.grade_id', '=', 'grades.id')
                ->select('grades.name as grade', DB::raw('COUNT(students.id) as students'))
                ->groupBy('grades.name')
                ->get();

        return response()->json($grades, 200);
    }

    public function chartTeachers()
    {
        $teachers = User::where('role', '=', 'Docente')
                ->join('assigments', 'users.id', '=', 'assigments.user_id')
                ->select('users.name as teacher', DB::raw(' COUNT(assigments.user_id) as Courses'))
                ->groupBy('users.name')
                ->get();
        return response()->json($teachers);
    }


}
