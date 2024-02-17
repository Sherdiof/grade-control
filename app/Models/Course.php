<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function assigments(): HasMany
    {
        return $this->hasMany(Assigment::class);
    }

    public function homeworks(): HasMany
    {
        return $this->hasMany(Homeworks::class);
    }
}
