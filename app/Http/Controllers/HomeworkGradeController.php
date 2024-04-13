<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Homeworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeworkGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function groupHomeworksGrades(Request $request)
    {

        $search = trim($request->search);
        if (auth()->user()->role == 'Admin') {
            $homeworksGrades = Homeworks::join('assigments', 'assigments.id', '=', 'homeworks.assigment_id')
                ->join('grades', 'grades.id', '=', 'assigments.grade_id')
                ->join('courses', 'courses.id', '=', 'assigments.course_id')
                ->selectRaw('COUNT(homeworks.name) AS homeworks, courses.name AS courses, grades.name AS grades, assigments.id AS assigment_id')
                ->where(function ($query) use ($search) {
                    $query->where('homeworks.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('grades.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('courses.name', 'LIKE', '%' . $search . '%');
                })
                ->groupBy('grades.name', 'courses.name', 'assigments.id')
                ->paginate(9);
        } else {
            $homeworksGrades = Homeworks::join('assigments', 'assigments.id', '=', 'homeworks.assigment_id')
                ->join('grades', 'grades.id', '=', 'assigments.grade_id')
                ->join('courses', 'courses.id', '=', 'assigments.course_id')
                ->selectRaw('COUNT(homeworks.name) AS homeworks, courses.name AS courses, grades.name AS grades, assigments.id AS assigment_id')
                ->where(function ($query) use ($search) {
                    $query->where('homeworks.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('grades.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('courses.name', 'LIKE', '%' . $search . '%');
                })
                ->whereHas('assigment', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->groupBy('grades.name', 'courses.name', 'assigments.id')
                ->paginate(9);
        }

// $results ahora contendrá el resultado de la consulta.
        return view('homeworks.groupHomeworksGrades', compact('homeworksGrades', 'search'));
    }

    public function viewHomeworks(string $grade_id)
    {
        $homeworks = Homeworks::join('assigments', 'assigments.id', '=', 'homeworks.assigment_id')
            ->where('assigments.id',  $grade_id)
            ->select('homeworks.*')
            ->paginate(10);

        $assigment = Assigment::find($grade_id);

        return view('homeworks.viewHomeworksGrades', compact('assigment', 'homeworks'));
    }
    /**
     * Show the form for creating a new resource.
     */
}
