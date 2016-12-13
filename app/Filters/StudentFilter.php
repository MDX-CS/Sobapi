<?php

namespace App\Filters;

use Koch\Filters\Filter;

class StudentFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'student_id', 'firstname', 'lastname', 'network_name', 'email', 'student_number',
    ];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'student_id',
        'name' => 'network_name',
        'first_name' => 'firstname',
        'last_name' => 'lastname',
        'email' => 'email',
    ];
}
