<?php

namespace App\Filters;

class SobFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = ['id', 'name', 'description', 'level_id', 'topic_id'];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'id',
        'name' => 'name',
        'level' => 'levels.name',
        'topic' => 'topics.name',
    ];
}
