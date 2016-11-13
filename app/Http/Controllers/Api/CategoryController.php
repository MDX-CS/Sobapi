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
     * @param  \App\Repositories\SobRepository  $repository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(SobRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }

    /**
     * Show all sobs under given level.

     * @param  \App\Models\Topic|null  $topic
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
<<<<<<< HEAD
     * @param  \App\Models\Topic|null  $topic
     * @param  \App\Models\Sob|null  $sob
=======
     * @param  \App\Models\Topic  $topic
     * @param  \App\Models\Sob  $sob
>>>>>>> 5f05e8af4337735cc1bc6b12a8ec9f48f9163e09
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
