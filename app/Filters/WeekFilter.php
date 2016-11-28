<?php

namespace App\Filters;

use Koch\Filters\Filter;

class WeekFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'week_id', 'week_start', 'week_end',
    ];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'week_id',
        'start' => 'week_start',
        'end' => 'week_end',
    ];
}
