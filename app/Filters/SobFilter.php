<?php

namespace App\Filters;

class SobFilter extends Filter
{
    /**
     * Default searchable columns.
     *
     * @var array
     */
    protected $searchable = ['sob'];

    /**
     * Default orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'sob' => 'sob',
    ];
}
