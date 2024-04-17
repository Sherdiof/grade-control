<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'status'
    ];

    public function homeworks(): HasMany
    {
        return $this->hasMany(Homeworks::class);
    }
}
