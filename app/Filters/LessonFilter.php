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
    protected $searchable = [];

    /**
     * Orderable columns.
     *
     * @var array
     */
    protected $orderable = [];
}
