<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Rules\DoesntExistsClass;
use Illuminate\Http\Request;
use Psy\Util\Str;

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
            'name' => ['required', 'max:5', new DoesntExistsClass($request->input('grade_id'))],
            'grade_id' => 'required'
        ]);

            Classes::create($validate);

        return redirect()->route('classes.index')->with('status', 'Se ha creado el registro correctamente!');

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
            'name' => ['required', 'max:5', new DoesntExistsClass($request->input('grade_id'))],
            'grade_id' => 'required'
        ]);

            $class->name = $request->name;
            $class->grade_id = $request->grade_id;
            $class->update();
            return redirect()->route('classes.index')->with('status', 'Se ha actualizado el registro correctamente!');
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
