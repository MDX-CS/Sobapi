<?php

namespace App\Filters;

use Koch\Filters\Filter;

class SobFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = ['sob_id', 'sob', 'sob_notes', 'level_id', 'topic_id'];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'sob_id',
        'name' => 'sob',
        'end' => 'expected_end_date',
        'start' => 'expected_start_date',
    ];
}
