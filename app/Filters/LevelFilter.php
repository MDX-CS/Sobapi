<?php

namespace App\Filters;

class LevelFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'level',
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
