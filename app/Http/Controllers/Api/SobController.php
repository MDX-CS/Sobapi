<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Filters\SobFilter;
use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class SobController extends ApiController
{
    /**
     * The repository.
     *
     * @var \App\Repositories\SobRepository
     */
    protected $repository;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\SobRepository  $repository
     * @return void
     */
    public function __construct(SobRepository $repository, Responder $responder)
    {
        parent::__construct($responder);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SobFilter $filter)
    {
        $sobs = Sob::filter($filter)->get();

        return $this->respond()
            ->ok()
            ->withData($this->repository->cast($sobs))
            ->send();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if ($this->repository->invalid()) {
            return $this->respond()
                ->unprocessable()
                ->send();
        }

        Sob::create(request()->all());

        return $this->respond()
            ->created()
            ->send();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function show(Sob $sob = null)
    {
        if (! $sob->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        return $this->respond()
            ->ok()
            ->withData($this->repository->cast($sob))
            ->send();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function update(Sob $sob = null)
    {
        if (! $sob->exists) {
            return $this->respond()
                ->notFound()
                ->send();
        }

        if ($this->repository->invalid()) {
            return $this->respond()
                ->unprocessable()
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
