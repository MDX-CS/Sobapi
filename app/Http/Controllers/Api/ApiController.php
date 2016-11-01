<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Repository;
use App\Http\Responder\Responder;
use App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    /**
     * Responder object.
     *
     * @var \App\Repositories\Repository
     */
    protected $repository;

    /**
     * Responder object.
     *
     * @var \App\Http\Responder\Responder
     */
    protected $responder;

    /**
     * Class contructor.
     *
     * @return void
     */
    public function __construct(Repository $repository, Responder $responder)
    {
        $this->responder = $responder;
        $this->repository = $repository;

        $this->middleware('json');
        $this->middleware('auth:api');
    }
}
