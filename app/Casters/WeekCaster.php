<?php

namespace App\Casters;

use Koch\Casters\Caster;

class WeekCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'week_id' => '!name:id|type:int',
            'week_start',
            'week_end',
        ];
    }
}
