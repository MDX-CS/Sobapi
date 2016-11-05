<?php

namespace App\Casters;

use App\Models\Sob;

class SobCaster extends Caster
{
    /**
     * Level caster instance.
     *
     * @var \App\Casters\LevelCaster
     */
    protected $levelCaster;

    /**
     * Topic caster instance.
     *
     * @var \App\Casters\TopicCaster
     */
    protected $topicCaster;

    /**
     * Class constructor.
     *
     * @param  \App\Casters\CastBuilder  $builder
     * @param  \App\Casters\LevelCaster  $levelCaster
     * @param  \App\Casters\TopicCaster  $topicCaster
     * @return void
     */
    public function __construct(
        CastBuilder $builder,
        LevelCaster $levelCaster,
        TopicCaster $topicCaster
    ) {
        parent::__construct($builder);

        $this->levelCaster = $levelCaster;
        $this->topicCaster = $topicCaster;
    }

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
                return $this->levelCaster->cast($sob->level);
            },
            'topic' => function (Sob $sob) {
                return $this->topicCaster->cast($sob->topic);
            },
            'sob_notes' => 'description',
            'expected_start_date',
            'expected_completion_date',
        ];
    }
}
