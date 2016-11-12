<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Models\Level;
use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class DifficultyController extends Controller
{
    /**
     * Class constructor.
     *
     * @param  \App\Repositories\SobRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(SobRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
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
            ->withData($level->sobs->cast())
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
