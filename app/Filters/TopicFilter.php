<?php

namespace App\Filters;

class TopicFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'topic',
    ];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'topic',
        'topic_id',
    ];
}
