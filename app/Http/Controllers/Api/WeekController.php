<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\WeekRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class WeekController extends Controller
{
    use PerformsCrudOperations;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\WeekRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(WeekRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }
}
