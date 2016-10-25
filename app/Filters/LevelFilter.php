<?php

namespace App\Filters;

class LevelFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = ['id', 'name'];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'id',
        'name' => 'name',
    ];
}
