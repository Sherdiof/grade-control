<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Period;

class DoesntExistsPeriod implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $period;

    public function __construct($period)
    {
        $this->period = $period;
    }

    public function validate(string $attribute, mixed $value, Closure $fail):
    void
    {
        // Verificar si ya existe una sección para el grado dado
        $existingSection = Period::where('year', $this->period)
            ->where('name', $value)
            ->exists();

        // Devolver false si ya existe una sección para el grado
        if($existingSection != null){
            $fail('Ya existe este período asignado al año que agregó');
        };
    }
}
