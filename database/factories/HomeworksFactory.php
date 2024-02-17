<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Homeworks;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Homeworks>
 */
class HomeworksFactory extends Factory
{
    protected $model = Homeworks::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(4, true),
            'description' => fake()->sentence(10),
            'value' => 10,
            'period_id' => Period::all()->random()->id,
            'course_id' => Course::all()->random()->id,
        ];
    }
}
