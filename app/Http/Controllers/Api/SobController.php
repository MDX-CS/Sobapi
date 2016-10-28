<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class SobController extends ApiController
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
}
