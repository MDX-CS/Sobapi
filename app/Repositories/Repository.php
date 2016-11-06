<?php

namespace App\Repositories;

use App\Casters\Caster;
use App\Filters\Filter;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * Resource caster.
     *
     * @var \App\Casters\Caster
     */
    protected $caster;

    /**
     * Resource filter.
     *
     * @var \App\Filters\Filter
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
     * @param  \App\Casters\Caster  $caster
     * @param  \App\Filters\Filter  $filter
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function __construct(Caster $caster, Filter $filter, Model $model)
    {
        $this->caster = $caster;
        $this->filter = $filter;
        $this->model = $model;
    }

    /**
     * Performs resource casting.
     *
     * @return \App\Casters\Caster
     */
    public function cast($model)
    {
        return $this->caster->cast($model);
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
        return $this->model->find($id);
    }

    /**
     * Stores the request data onto assigned database table.
     *
     * @return bool
     */
    public function store()
    {
        return $this->model->create(request()->all());
    }

    /**
     * Returns the model name.
     *
     * @return \Illuminate\Database\Eloquent\Model
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
}