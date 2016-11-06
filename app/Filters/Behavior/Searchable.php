<?php

namespace App\Filters\Behavior;

trait Searchable
{
    /**
     * Searches given columns.
     *
     * @param  string  $pattern
     * @return void
     */
    public function search($pattern = null)
    {
        if (! $pattern) {
            return;
        }

        foreach ($this->searchable as $column) {
            $this->resolveSearch($column, $pattern);
        }
    }

    /**
     * Recursively build up the search query.
     *
     * @param  string  $column
     * @param  string  $key
     * @return void
     */
    protected function resolveSearch($column, $key)
    {
        $this->resolve($column, $key, $this->getTableName(), function ($query, $pattern) {
            $this->builder->orWhere($query, 'LIKE', "%{$pattern}%");
        });
    }
}
