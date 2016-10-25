<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use App\Casters\LevelCaster;
use App\Filters\LevelFilter;
use App\Http\Requests\LevelRequest;

class LevelController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Filters\LevelFilter  $filter
     * @param  \App\Casters\LevelCaster  $caster
     * @return \Illuminate\Http\Response
     */
    public function index(LevelFilter $filter, LevelCaster $caster)
    {
        $levels = Level::filter($filter)->get();

        return $this->respond()
            ->ok()
            ->withData($caster->cast($levels))
            ->send();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LevelRequest  $requets
     * @return \Illuminate\Http\Response
     */
    public function store(LevelRequest $request)
    {
        Level::create($request->all());

        return $this->respond()
            ->created()
            ->send();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Casters\LevelCaster  $caster
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(LevelCaster $caster, Level $level = null)
    {
        if (! $level->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        return $this->respond()
            ->ok()
            ->withData($caster->cast($level))
            ->send();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LevelRequest  $requets
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(LevelRequest $request, Level $level = null)
    {
        if (! $level->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        $level->update($request->all());

        return $this->respond()
            ->accepted()
            ->send();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level = null)
    {
        if (! $level->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        $level->delete();

        return $this->respond()
            ->deleted()
            ->send();
    }
}
