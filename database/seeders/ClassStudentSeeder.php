<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\ClassStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassStudent::factory()->count(100)->create();
    }
}
