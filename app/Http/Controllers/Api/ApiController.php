<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
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
    public function __construct(Responder $responder)
    {
        // $this->middleware('auth:api');

        $this->responder = $responder;
    }

    /**
     * Returns the responder object.
     *
     * @return \App\Http\Responder\Responder
     */
    protected function respond()
    {
        return $this->responder;
    }
}
