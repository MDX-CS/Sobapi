<?php

namespace App\Repositories;

use App\Models\Week;
use App\Filters\WeekFilter;

class WeekRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\WeekFilter  $filter
     * @param  \App\Models\Week  $model
     * @return void
     */
    public function __construct(WeekFilter $filter, Week $model)
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
            //
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
            //
        ];
    }
}
