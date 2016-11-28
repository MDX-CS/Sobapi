<?php

namespace App\Filters;

use Koch\Filters\Filter;

class StaffFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'staff_id', 'firstname', 'lastname', 'email',
    ];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'staff_id',
        'first_name' => 'firstname',
        'last_name' => 'lastname',
        'email' => 'email',
    ];
}
