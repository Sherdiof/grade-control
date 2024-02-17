<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Homeworks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'value',
        'period_id',
        'course_id',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function studentHomework(): BelongsTo
    {
        return $this->belongsTo(StudentHomeworks::class);
    }
}
