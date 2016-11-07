<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Models\Level;
use App\Casters\SobCaster;
use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class LevelSobController extends Controller
{
    /**
     * The Caster instance.
     *
     * @var \App\Casters\SobCaster
     */
    protected $caster;

    /**
     * Class constructor.
     *
     * @param  \App\Casters\SobCaster  $caster
     * @param  \App\Repositories\SobRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(SobCaster $caster, SobRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);

        $this->caster = $caster;
    }

    /**
     * Show all sobs under given level.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function index(Level $level = null)
    {
        $this->authorize('view', $this->repository->modelName());

        if (! $level->exists) {
            return $this->responder->notFound()->send();
        }

        return $this->responder
            ->ok()
            ->withData($this->caster->cast($level->sobs))
            ->send();
    }

    /**
     * Associates given sob with given level.
     *
     * @param  \App\Models\Level  $level
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function update(Level $level = null, Sob $sob = null)
    {
        $this->authorize('update', $this->repository->modelName());

        if (! $sob->exists || ! $level->exists) {
            return $this->responder->notFound()->send();
        }

        $level->reassign($sob);

        return $this->responder->accepted()->send();
    }
}
