<?php

namespace App\Repositories;

use App\Models\Student;
use App\Filters\StudentFilter;

class StudentRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\StudentFilter  $filter
     * @param  \App\Models\Student  $model
     * @return void
     */
    public function __construct(StudentFilter $filter, Student $model)
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
