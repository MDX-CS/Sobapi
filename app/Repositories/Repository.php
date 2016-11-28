<?php

namespace App\Repositories;

use Koch\Filters\Contracts\Filter;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * Resource filter.
     *
     * @var \Koch\Filters\Contracts\Filter
     */
    protected $filter;

    /**
     * Resource model.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Class constructor.
     *
     * @param  \Koch\Filters\Contracts\Filter  $filter
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function __construct(Filter $filter, Model $model)
    {
        $this->filter = $filter;
        $this->model = $model;
    }

    /**
     * Filters given resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filter()
    {
        return $this->model->filter($this->filter);
    }

    /**
     * Returns the model instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * Returns the model instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->where($this->databaseKey(), $id)->first();
    }

    /**
     * Stores the request data onto assigned database table.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store()
    {
        return $this->model->create(request()->all());
    }

    /**
     * Returns the model name.
     *
     * @return string
     */
    public function modelName()
    {
        return ltrim(get_class($this->model()), '\\');
    }

    /**
     * Validation rules for the store action.
     *
     * @return array
     */
    abstract public function storeRules();

    /**
     * Validation rules for the update action.
     *
     * @return array
     */
    abstract public function updateRules();

    /**
     * The database key for given resource.
     *
     * @return string
     */
    abstract public function databaseKey();
}
