<?php

namespace App\Repositories;

use App\Models\Staff;
use App\Filters\StaffFilter;

class StaffRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\StaffFilter  $filter
     * @param  \App\Models\Staff  $model
     * @return void
     */
    public function __construct(StaffFilter $filter, Staff $model)
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
