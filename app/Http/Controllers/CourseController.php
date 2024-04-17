<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
        $courses = Course::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name', 'asc')->paginate(10);

        return view('courses.index', compact('courses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:255'],
        ]);

        Course::create([
            'name' => $request->name,
        ]);

        return redirect()->route('courses.index')->with('status', 'Se ha creado el registro correctamente!');

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
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:50'],
        ]);
        $course->name = $request->name;

        $course->update();
        return redirect()->route('courses.index')->with('status', 'Se ha actualizado el registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('eliminar', 'ok');
    }
}
