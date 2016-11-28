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
            'network_name' => 'required|min:5',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email|unique:staffs,email',
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
            'network_name' => 'min:5',
            'firstname' => 'min:2',
            'lastname' => 'min:2',
            'email' => 'email|unique:staffs,email',
        ];
    }

    /**
     * The database key for this resource.
     *
     * @return array
     */
    public function databaseKey()
    {
        return 'staff_id';
    }
}
