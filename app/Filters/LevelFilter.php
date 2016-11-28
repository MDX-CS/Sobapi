<?php

namespace App\Filters;

use Koch\Filters\Filter;

class LevelFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'level', 'level_id',
    ];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'level',
        'level_id',
    ];
}
