<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\LessonRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class LessonController extends ApiController
{
    use PerformsCrudOperations;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\LessonRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(LessonRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }
}
