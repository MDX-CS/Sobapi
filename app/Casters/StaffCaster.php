<?php

namespace App\Casters;

use Koch\Casters\Caster;

class StaffCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'staff_id' => '!name:id|type:int',
            'firstname' => 'first_name',
            'lastname' => 'last_name',
            'email',
        ];
    }
}
