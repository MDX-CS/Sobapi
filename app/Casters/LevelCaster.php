<?php

namespace App\Casters;

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
            'id' => '!type:int',
            'name',
            'slug',
        ];
    }
}
