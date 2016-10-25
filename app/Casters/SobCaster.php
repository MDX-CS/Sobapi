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
            'id',
            'sob' => 'name',
            'level' => function (Sob $sob) {
                return (int) ++$sob->level_id;
            },
            'topic_id' => '!name:topic|type:int',
            'active' => '@active',
            'sob_notes' => 'notes',
            'expected_start_date',
            'expected_completion_date',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Sets the active field.
     *
     * @param  \App\Models\Sob  $sob
     * @return bool
     */
    protected function active(Sob $sob)
    {
        return $sob->sob;
    }
}
