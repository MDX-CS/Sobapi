<?php

namespace App\Casters;

use App\Models\Sob;

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
            'id' => '!type:int',
            'name',
            'level_id' => '!name:level|type:int',
            'topic_id' => '!name:topic|type:int',
            'description',
            'expected_start_date',
            'expected_completion_date',
            'created_at',
            'updated_at',
        ];
    }
}
