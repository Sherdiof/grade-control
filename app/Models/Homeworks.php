<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Homeworks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'value',
        'period_id',
        'assigment_id',
    ];

    public function assigment(): BelongsTo
    {
        return $this->belongsTo(Assigment::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function studentHomework(): HasMany
    {
        return $this->hasMany(StudentHomeworks::class);
    }
}
