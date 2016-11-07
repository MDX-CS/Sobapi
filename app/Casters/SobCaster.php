<?php

namespace App\Casters;

use App\Models\Sob;
use Koch\Casters\Caster;

class SobCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'sob_id' => '!name:id|type:int',
            'url',
            'sob' => 'name',
            'level' => function (Sob $sob) {
                return $sob->level->cast();
            },
            'topic' => function (Sob $sob) {
                return $sob->topic->cast();
            },
            'sob_notes' => 'description',
            'expected_start_date',
            'expected_completion_date',
        ];
    }
}
