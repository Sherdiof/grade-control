<?php

namespace Database\Seeders;

use App\Models\Homeworks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homeworks::factory()->count(300)->create();
    }
}
