<?php

namespace App\Repositories;

use App\Models\Sob;
use App\Filters\SobFilter;

class SobRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\SobFilter  $filter
     * @param  \App\Models\Sob  $model
     * @return void
     */
    public function __construct(SobFilter $filter, Sob $model)
    {
        parent::__construct($filter, $model);
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
