<?php

namespace App\Casters;

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
            'level_id' => '!name:level|type:int',
            'topic_id' => '!name:topic|type:int',
            'sob_notes' => 'description',
            'expected_start_date',
            'expected_completion_date',
        ];
    }
}
