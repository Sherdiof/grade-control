<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('classes.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:1|max:5',
            'grade_id' => 'required'
        ]);
        $result = Classes::where('name', $validate['name'])->where('grade_id', $validate['grade_id'])->first();
        if ($result == null) {
            $validate['name'] = strtoupper($validate['name']);
            Classes::create($validate);
            return redirect()->route('classes.index')->with('status', 'Se ha creado el registro correctamente!');
        } else {
            return back()->with('status', 'El grado ya ha sido asignado a una sección existente.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        $grades = Grade::all();
        return view('classes.edit', compact('class', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required|min:1|max:5',
            'grade_id' => 'required'
        ]);
        $result = Classes::where('name', $request->name)->where('grade_id', $request->grade_id)->first();

        if ($result == null) {
            $class->name = strtoupper($request->name);
            $class->grade_id = $request->grade_id;
            $class->update();
            return redirect()->route('classes.index')->with('status', 'Se ha actualizado el registro correctamente!');
        } else {
            return back()->with('status', 'El grado ya ha sido asignado a una sección existente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('eliminar', 'ok');
    }
}
