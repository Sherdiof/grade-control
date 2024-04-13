<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $docente = Role::create(['name' => 'Docente']);
        $user1 = User::find(1);
        $user2 = User::find(2);
        $user1->assignRole($admin);
        $user2->assignRole($docente);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
