<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tutor',
        'age',
        'phone',
        'gender',
        'birthdate'
    ];

    public function classtudent(): BelongsTo
    {
        return $this->belongsTo(ClassStudent::class, 'id', 'student_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function studentHomework(): HasMany
    {
        return $this->hasMany(StudentHomeworks::class, 'student_id', 'id');
    }
}
