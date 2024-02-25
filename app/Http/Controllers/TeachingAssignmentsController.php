<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class TeachingAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assigment::all();
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        $courses = Course::all();
        $users = User::all();
        return view('assignments.create', compact('grades', 'users', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
//            'course_id' => 'required|array',
//            'grade_id' => 'required'
        ]);

        if (strlen($request->hiddenGrade) == 1){
            foreach ($request->input('course_id') as $course){
                Assigment::create([
                    'user_id' => $request->user_id,
                    'grade_id' => $request->hiddenGrade,
                    'course_id' => $course
                ]);
            }
        } else{
            foreach ($request->input('grade_id') as $grade){
                Assigment::create([
                    'user_id' => $request->user_id,
                    'course_id' => $request->hiddenCourse,
                    'grade_id' => $grade
                ]);
            }
        }

        return redirect()->route('assignments.index')->with('status', 'Se ha creado el registro correctamente!');
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
    public function edit(Assigment $assignment)
    {
        $grades = Grade::all();
        $courses = Course::all();
        $users = User::all();
        return view('assignments.edit', compact('grades', 'users', 'courses', 'assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assigment $assignment)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'grade_id' => 'required',
            'course_id' => 'required',
        ]);
        $assignment->user_id = $request->user_id;
        $assignment->grade_id = $request->grade_id;
        $assignment->course_id = $request->course_id;

        $assignment->update();
        return redirect()->route('assignments.index')->with('status', 'Se ha actualizado el registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
