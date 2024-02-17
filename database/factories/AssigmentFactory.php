<?php

namespace Database\Factories;

use App\Models\Assigment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assigment>
 */
class AssigmentFactory extends Factory
{
    protected $model = Assigment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'course_id' => Course::all()->random()->id,
            'grade_id' => Grade::all()->random()->id,
        ];
    }
}
