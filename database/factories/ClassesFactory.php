<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassesFactory extends Factory
{
    protected $model = Classes::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['a', 'b', 'c', 'd']),
            'grade_id' => Grade::all('id')->random()->id,
        ];
    }
}
