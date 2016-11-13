<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\StaffRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class StaffController extends Controller
{
    use PerformsCrudOperations;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\StaffRepository  $repository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(StaffRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }
}
