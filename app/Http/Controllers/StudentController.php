<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ClassStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $validate = $request->validated();
        $validate['status'] = 'ACTIVO';
        Student::create($validate);
        return redirect()->route('students.index')->with('status', 'Se ha creado el registro correctamente!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validate = $request->validated();
        $student->update($validate);
        return redirect()->route('students.index')->with('status', 'Se ha actualizado el registro correctamente!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('eliminar', 'ok');
    }

}
