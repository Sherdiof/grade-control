<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    protected $model = Course::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->count(5)->create();
    }
}
