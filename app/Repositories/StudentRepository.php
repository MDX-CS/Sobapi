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
            'staff_id' => 'required|numeric',
            'network_name' => 'required|min:4|unique:students,network_name',
            'firstname' => 'required|min:4',
            'lastname' => 'required|min:4',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6',
            'student_number' => 'required|min:8|unique:students,student_number',
            'visa' => 'numeric',
            'foundation' => 'numeric',
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
            'staff_id' => 'numeric',
            'network_name' => 'min:4|unique:students,network_name',
            'firstname' => 'min:4',
            'lastname' => 'min:4',
            'email' => 'email|unique:students,email',
            'password' => 'min:6',
            'student_number' => 'min:8|unique:students,student_number',
            'visa' => 'numeric',
            'foundation' => 'numeric',
        ];
    }

    /**
     * The database key for this resource.
     *
     * @return array
     */
    public function databaseKey()
    {
        return 'student_id';
    }
}
