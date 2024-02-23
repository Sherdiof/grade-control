<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Classes;


class DoesntExistsClass implements ValidationRule
{


    protected $grade;

    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    public function validate(string $attribute, mixed $value, Closure $fail):
    void
    {
        // Verificar si ya existe una sección para el grado dado
        $existingSection = Classes::where('grade_id', $this->grade)
            ->where('name', $value)
            ->exists();

        // Devolver false si ya existe una sección para el grado
        if($existingSection != null){
            $fail('Ya existe un grado asignado a esta sección');
        };
    }

}
