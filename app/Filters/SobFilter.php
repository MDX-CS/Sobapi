<?php

namespace App\Filters;

class SobFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = ['id', 'sob', 'sob_notes', 'level_id', 'topic_id'];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'id',
        'sob' => 'sob',
    ];
}
