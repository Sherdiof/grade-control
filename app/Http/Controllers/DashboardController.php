<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Course;
use App\Models\Homeworks;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Admin
        $students = Student::count();
        $teachers = User::where('role', 'Docente')->count();
        $courses = Course::count();

        // Docente
        $coursesTeacher = Assigment::where('user_id', auth()->user()->id)->count();
        $gradesTeacher = Assigment::where('user_id', auth()->user()->id)->groupBy('grade_id')->count();
        $homeworksTeacher = Homeworks::with('assigment')
            ->whereHas('assigment', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->count();

//        return response()->json($homeworksTeacher);
        return view('dashboard', compact('students', 'teachers', 'courses', 'coursesTeacher', 'gradesTeacher', 'homeworksTeacher'));
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
