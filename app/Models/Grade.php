<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function class(): HasMany
    {
        return $this->hasMany(Classes::class);
    }

    public function assigment(): BelongsTo
    {
        return $this->belongsTo(Assigment::class);
    }
}
