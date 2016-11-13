<?php

namespace App\Casters;

use Koch\Casters\Caster;

class LessonCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'crn_id' => '!name:id|type:int',
            'room',
            'day',
            'starttime' => 'start_time',
            'endtime' => 'end_time',
        ];
    }
}
