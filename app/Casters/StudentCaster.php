<?php

namespace App\Casters;

use App\Models\Student;
use Koch\Casters\Caster;

class StudentCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'student_id' => '!name:id|type:int',
            'tutor' => function (Student $student) {
                return $student->tutor ? $student->tutor()->cast() : [];
            },
            'network_name' => 'name',
            'firstname' => 'first_name',
            'lastname' => 'last_name',
            'email',
            'student_number',
            'visa' => '!type:bool',
            'foundation' => '!type:bool',
        ];
    }
}
