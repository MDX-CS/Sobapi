<?php

namespace App\Filters\Behavior;

trait Orderable
{
    /**
     * Magic method to build up order queries.
     *
     * @param  string  $method
     * @param  array  $args
     * @return void
     */
    public function __call($method, $args)
    {
        if (! array_key_exists($method, $this->orderable)) {
            return;
        }

        $this->resolveOrder($this->orderable[$method], $args[0]);
    }

    /**
     * Recursively build up the order query.
     *
     * @param  string  $column
     * @param  string  $key
     * @return void
     */
    protected function resolveOrder($column, $key)
    {
        $this->resolve($column, $key, $this->getTableName(), function ($query, $pattern) {
            $this->builder->orderBy($query, $pattern);
        });
    }
}
