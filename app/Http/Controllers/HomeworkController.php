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

        $search = trim($request->search);
        $homeworks = Homeworks::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('value', 'LIKE', '%' . $search . '%')
            ->orWhereHas('period', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('assigment', function ($query) use ($search) {
                $query->whereHas('course', function ($courseQuery) use ($search) {
                    $courseQuery->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhere('user_id', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);


        return view('homeworks.index', compact('homeworks', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::all();
        $courses = Assigment::all();
        return view('homeworks.create', compact('periods', 'courses'));
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
            'assigment_id' => ['required']
        ]);

        Homeworks::create([
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value,
            'period_id' => $request->period_id,
            'assigment_id' => $request->assigment_id
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
    public function edit(Homeworks $homework)
    {

        $periods = Period::all();
        $courses = Course::join('assigments', 'assigments.course_id', '=', 'courses.id')
            ->groupBy('assigments.id', 'courses.name')
            ->select('assigments.id', 'courses.name')
            ->get();
        return view('homeworks.edit', compact('homework', 'periods', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Homeworks $homework)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:50'],
            'description' => 'max:300',
            'value' => 'required', 'min:2', 'max:100',
            'period_id' => ['required'],
            'assigment_id' => ['required']
        ]);
        $homework->name = $request->name;
        $homework->description = $request->description;
        $homework->period_id = $request->period_id;
        $homework->assigment_id = $request->assigment_id;

        $homework->update();
        return redirect()->route('homeworks.index')->with('status', 'Se ha actualizado el registro correctamente!');
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
