<?php

namespace App\Filters;

use Koch\Filters\Filter;

class LessonFilter extends Filter
{
    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'room', 'day', 'id',
    ];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [
        'id' => 'lesson_id',
        'room' => 'room',
        'day' => 'day',
        'start' => 'starttime',
        'end' => 'endtime',
    ];
}
