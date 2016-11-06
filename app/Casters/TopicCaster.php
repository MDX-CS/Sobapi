<?php

namespace App\Casters;

class TopicCaster extends Caster
{
    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function castRules()
    {
        return [
            'topic_id' => '!name:id|type:int',
            'topic' => 'name',
        ];
    }
}
