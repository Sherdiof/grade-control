<?php

namespace App\Exports;

use App\Models\Classes;
use App\Models\Student;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $class;
    protected $start;
    protected $end;

    public function __construct(Classes $class, string $start, string $end)
    {
        $this->class = $class;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $start = Carbon::parse($this->start)->format('Y-m-d');
        $end = Carbon::parse($this->end)->format('Y-m-d');
        $students = Student::with(['attendances' => function ($query) use ($start, $end) {
            $query->where('class_id', $this->class->id)
                ->whereBetween('date', [$start, $end])
                ->orderBy('date');
        }, 'classtudent.class'])->whereHas('attendances', function ($query) use ($start, $end) {
            $query->where('class_id', $this->class->id)
                ->whereBetween('date', [$start, $end])
                ->orderBy('date');
        })
            ->get()
            ->map(function ($student) {
                $attendanceDescription = [];
                $assist = 0;
                $notAssist = 0;
                foreach ($student->attendances as $attendance) {
                    $date = $attendance->date;
                    $attendanceDescription[$date] = $attendance->attendance_class;

                    if ($attendance->attendance_class == 'Assist') {
                        $assist++;
                    } else {
                        $notAssist++;
                    }
                }

                return [
                    'name' => $student->name,
                    'section' => $student->classtudent->class->name,
                    'attendance' => $attendanceDescription,
                    'assist' => $assist,
                    'noAssist' => $notAssist
                ];
            });

        $dates = [];
        foreach ($students as $student){
            if (!empty($student['attendance'])){
                $aux = array_keys($student['attendance']);
                $dates = array_merge($dates, $aux);
            }
        }

        $dates = array_unique($dates);

        $class = $this->class;

        return view('excel.attendance', compact('students','dates','class', 'start', 'end'));
    }
}
