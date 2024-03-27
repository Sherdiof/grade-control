<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function homework(): BelongsTo
    {
        return $this->belongsTo(Homeworks::class, 'homeworks_id', 'id');
    }
}
