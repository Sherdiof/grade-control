<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => Classes::all()->random()->id,
            'student_id'=> Student::all()->random()->id,
            'attendance_class' => fake()->randomElement(['si', 'no']),
            'date' => Carbon::now(),
        ];
    }
}
