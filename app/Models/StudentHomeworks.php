<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentHomeworks extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'homeworks_id',
        'score'
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function homeworks(): HasMany
    {
        return $this->hasMany(Homeworks::class);
    }
}
