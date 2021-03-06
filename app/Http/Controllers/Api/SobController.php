<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\SobRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class SobController extends Controller
{
    use PerformsCrudOperations;

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
}
