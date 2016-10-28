<?php

namespace App\Repositories;

use App\Models\Sob;
use App\Casters\SobCaster;
use App\Filters\SobFilter;
use App\Http\Requests\SobRequest;

class SobRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Casters\SobCaster  $caster
     * @param  \App\Filters\SobFilter  $filter
     * @param  \App\Http\Requests\SobRequest  $request
     * @param  \App\Models\Sob  $model
     * @return void
     */
    public function __construct(SobCaster $caster, SobFilter $filter, SobRequest $request, Sob $model)
    {
        parent::__construct($caster, $filter, $request, $model);
    }
}
