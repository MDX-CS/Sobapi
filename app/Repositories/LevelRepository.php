<?php

namespace App\Repositories;

use App\Models\Level;
use App\Filters\LevelFilter;

class LevelRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\LevelFilter  $filter
     * @param  \App\Models\Level  $model
     * @return void
     */
    public function __construct(LevelFilter $filter, Level $model)
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
            'level' => 'required|min:3',
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
            'level' => 'min:3',
        ];
    }
}
