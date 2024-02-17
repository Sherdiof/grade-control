<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassStudent>
 */
class ClassStudentFactory extends Factory
{
    protected $model = ClassStudent::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => Classes::all()->random()->id,
            'student_id' => Student::all()->random()->id,
        ];
    }
}
