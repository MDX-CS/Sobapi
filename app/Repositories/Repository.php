<?php

namespace App\Repositories;

use App\Casters\Caster;
use App\Filters\Filter;
use Illuminate\Http\Request;
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
     * Resource request.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function __construct(Caster $caster, Filter $filter, Request $request, Model $model)
    {
        $this->caster = $caster;
        $this->filter = $filter;
        $this->request = $request;
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
     * Returns the request instance.
     *
     * @return \App\Http\Requests\Request
     */
    public function request()
    {
        return $this->request;
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
}
