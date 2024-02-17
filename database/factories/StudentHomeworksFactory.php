<?php

namespace Database\Factories;

use App\Models\Homeworks;
use App\Models\Student;
use App\Models\StudentHomeworks;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentHomeworksFactory extends Factory
{
    protected $model = StudentHomeworks::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::all()->random()->id,
            'homeworks_id' => Homeworks::all()->random()->id,
            'score' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
        ];
    }
}
