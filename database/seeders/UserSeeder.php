<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::factory()->count(5)->create();
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'area' => fake()->words(3, true),
            'remember_token' => Str::random(10),
        ]);

//        Role::create(['name' => 'Docente']);
//        $admin = Role::create(['name' => 'Admin']);
        $user->assignRole('Admin');
    }

}
