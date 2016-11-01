<?php

namespace App\Repositories;

use App\Models\Sob;
use App\Casters\SobCaster;
use App\Filters\SobFilter;
use App\Http\Requests\SobRequest;

class SobRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Casters\SobCaster  $caster
     * @param  \App\Filters\SobFilter  $filter
     * @param  \App\Models\Sob  $model
     * @return void
     */
    public function __construct(SobCaster $caster, SobFilter $filter, Sob $model)
    {
        parent::__construct($caster, $filter, $model);
    }

    /**
     * Validation rules for the store action.
     *
     * @return array
     */
    public function storeRules()
    {
        return [
            'sob' => 'required|min:5',
            'url' => 'required|min:5|url',
            'level_id' => 'required|numeric',
            'topic_id' => 'required|numeric',
            'expected_start_date' => 'required|date',
            'expected_completion_date' => 'required|date|after:expected_start_date',
        ];
    }

    /**
     * Validation rules for the update action.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'sob' => 'min:5',
            'url' => 'min:5|url',
            'level_id' => 'numeric',
            'topic_id' => 'numeric',
            'expected_start_date' => 'date',
            'expected_completion_date' => 'date|after:expected_start_date',
        ];
    }
}
