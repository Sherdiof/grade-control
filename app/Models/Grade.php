<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }

    public function assigment(): BelongsTo
    {
        return $this->belongsTo(Assigment::class);
    }
}
