<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\Behavior\Orderable;
use App\Filters\Behavior\Searchable;
use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    use Searchable, Orderable;

    /**
     * Already loaded relations.
     *
     * @var array
     */
    protected $loaded = [];

    /**
     * Default searchable columns.
     *
     * @var array
     */
    protected $searchable = ['name'];

    /**
     * Default orderable columns.
     *
     * @var array
     */
    protected $orderable = ['name' => 'name'];

    /**
     * Request data.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Builder instance.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Applies all available filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        // We need to select all columns from the original
        // table, since many joins can mess up the selected fields
        $this->builder->select("{$this->getTableName()}.*");

        foreach ($this->filters() as $name => $value) {
            $this->callFilterMethod($name, $value);
        }

        return $this->builder;
    }

    /**
     * Returns all filters from the request.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }

    /**
     * Helper function to call each filter method.
     *
     * @param  string  $name
     * @param  string  $value
     */
    protected function callFilterMethod($name, $value)
    {
        call_user_func_array([$this, $name], array_filter([$value]));
    }

    /**
     * Returns the associated table name.
     *
     * @return string
     */
    protected function getTableName()
    {
        return $this->builder->getModel()->getTable();
    }

    /**
     * Recursively build up the query.
     *
     * @param  string  $column
     * @param  string  $key
     * @param  string  $last
     * @param  callable  $callback
     * @return void
     */
    protected function resolve($column, $key, $last, callable $callback)
    {
        if (! strpos($column, '.')) {
            return $callback("{$last}.{$column}", $key);
        }

        $scope = strstr($column, '.', true);
        $singular = str_singular($scope);
        $next = substr(strstr($column, '.'), 1);

        $this->builder->join($scope, "{$last}.{$singular}_id", "{$scope}.id");

        return $this->resolve($next, $key, $scope, $callback);
    }
}
