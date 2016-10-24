<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Casters\SobCaster;
use App\Filters\SobFilter;
use App\Http\Requests\SobRequest;

class SobController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Filters\SobFilter  $filter
     * @param  \App\Casters\SobCaster  $caster
     * @return \Illuminate\Http\Response
     */
    public function index(SobFilter $filter, SobCaster $caster)
    {
        $sobs = Sob::filter($filter)->get();

        return $this->respond()
            ->ok()
            ->withData($caster->cast($sobs))
            ->send();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SobRequest  $requets
     * @return \Illuminate\Http\Response
     */
    public function store(SobRequest $request)
    {
        Sob::create($request->all());

        return $this->respond()
            ->created()
            ->send();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Casters\SobCaster  $caster
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function show(SobCaster $caster, Sob $sob = null)
    {
        if (! $sob->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        return $this->respond()
            ->ok()
            ->withData($caster->cast($sob))
            ->send();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SobRequest  $requets
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function update(SobRequest $request, Sob $sob = null)
    {
        if (! $sob->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        $sob->update(request()->all());

        return $this->respond()
            ->accepted()
            ->send();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sob $sob = null)
    {
        if (! $sob->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        $sob->delete();

        return $this->respond()
            ->deleted()
            ->send();
    }
}
