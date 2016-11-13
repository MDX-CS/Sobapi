<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\TopicRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class TopicController extends Controller
{
    use PerformsCrudOperations;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\TopicRepository  $repository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(TopicRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }
}
