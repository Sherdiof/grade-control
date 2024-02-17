<?php

namespace Database\Seeders;

use App\Models\StudentHomeworks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentHomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentHomeworks::factory()->count(500)->create();
    }
}
