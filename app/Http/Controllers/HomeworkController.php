<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Course;
use App\Models\Homeworks;
use App\Models\Period;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->role == 'Admin') {
            $courses = Course::paginate(10);
        } else {
            $courses = Course::with('assigments')
                ->whereHas('assigments', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->paginate(10);
        }
//        return response()->json($courses);
        return view('homeworks.new-index', compact('courses'));
    }

    public function showHomeworks(Course $course, Request $request)
    {
        $search = trim($request->search);
        $homeworks = Homeworks::with('assigment', 'period')
            ->whereHas('assigment', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('homeworks.show-homeworks', compact('homeworks', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $periods = Period::all();
        if (auth()->user()->role == 'Admin') {
            $course = Assigment::all();
        }

        return view('homeworks.create', compact('periods', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:100'],
            'description' => 'max:100',
            'value' => 'required', 'min:2', 'max:255',
            'period_id' => ['required'],
            'course_id' => ['required']
        ]);

        $assigment = Assigment::where('course_id', $request->course_id)->where('user_id', auth()->user()->id)->first();

        Homeworks::create([
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value,
            'period_id' => $request->period_id,
            'assigment_id' => $assigment->id
        ]);

        return redirect()->back()->with('status', 'Se ha creado el registro correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Homeworks $homework)
    {
        $courses = Assigment::all();
        $periods = Period::all();
        return view('homeworks.show', compact('homework', 'periods', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homeworks $homework, Course $course)
    {

        $periods = Period::all();
        if (auth()->user()->role == 'Admin') {
            $course = Course::join('assigments', 'assigments.course_id', '=', 'courses.id')
                ->groupBy('assigments.id', 'courses.name')
                ->select('assigments.id', 'courses.name')
                ->get();
        } else {

        }

        return view('homeworks.edit', compact('homework', 'periods', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Homeworks $homework, Course $course)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:50'],
            'description' => 'max:300',
            'value' => 'required', 'min:2', 'max:100',
            'period_id' => ['required'],
            'course_id' => ['required']
        ]);
        $homework->name = $request->name;
        $homework->description = $request->description;
        $homework->value = $request->value;
        $homework->period_id = $request->period_id;
        $homework->assigment_id = $request->course_id;

        $homework->update();
        return redirect()->route('homeworks.show-homeworks', $course)->with('status', 'Se ha actualizado el registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homeworks $homework)
    {
        $homework->delete();
        return back()->with('eliminar', 'ok');
    }

//$tasksByCourseAndPeriod = DB::table('homeworks')
//->join('courses', 'homeworks.course_id', '=', 'courses.course_id')
//->join('periods', 'homeworks.period_id', '=', 'periods.period_id')
//->select('courses.course_name as course', 'periods.period_name as period', DB::raw('COUNT(homeworks.name) as task_count'))
//->groupBy('courses.course_id', 'periods.period_id')
//->get();
}
