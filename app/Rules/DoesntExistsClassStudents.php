<?php

namespace App\Rules;

use App\Models\ClassStudent;
use App\Models\Student;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DoesntExistsClassStudents implements ValidationRule
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Verificar si ya existe una sección para el grado dado
        $existingStudent = ClassStudent::where('class_id', $this->class)
            ->where('student_id', $value)
            ->exists();

        $student = Student::find($value);

        // Devolver false si ya existe una sección para el grado
        if($existingStudent != null){
            $fail('El estudiante ' . $student->name . ' ya esta agregado a este grado y sección.');
        };
    }
}
