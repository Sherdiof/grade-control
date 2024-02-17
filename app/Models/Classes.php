<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade_id',
    ];

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function class_students(): HasMany
    {
        return $this->hasMany(ClassStudent::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
