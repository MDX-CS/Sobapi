<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\LevelRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class LevelController extends Controller
{
    use PerformsCrudOperations;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\LevelRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(LevelRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }
}
