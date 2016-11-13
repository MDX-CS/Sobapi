<?php

namespace App\Casters;

use Koch\Casters\Caster;

class LevelCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'level_id' => '!name:id|type:int',
            'level' => 'name',
        ];
    }
}
