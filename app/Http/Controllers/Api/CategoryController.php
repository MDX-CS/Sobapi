<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Models\Topic;
use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class CategoryController extends Controller
{
    /**
     * Class constructor.
     *
     * @param  \App\Repositories\LessonRepository  $repository
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
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function index(Topic $topic = null)
    {
        $this->authorize('view', $this->repository->modelName());

        if (! $topic->exists) {
            return $this->responder->notFound()->send();
        }

        return $this->responder
            ->ok()
            ->withData($topic->sobs()->cast())
            ->send();
    }

    /**
     * Associates given sob with given level.
     *
     * @param  \App\Models\Topic  $topic
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function update(Topic $topic = null, Sob $sob = null)
    {
        $this->authorize('update', $this->repository->modelName());

        if (! $sob->exists || ! $topic->exists) {
            return $this->responder->notFound()->send();
        }

        $topic->reassign($sob);

        return $this->responder->accepted()->send();
    }
}
