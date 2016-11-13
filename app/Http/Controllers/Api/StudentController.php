<?php

namespace App\Http\Controllers\Api;

use App\Http\Responder\Responder;
use App\Repositories\StudentRepository;
use App\Http\Controllers\Behavior\PerformsCrudOperations;

class StudentController extends Controller
{
    use PerformsCrudOperations;

    /**
     * Class constructor.
     *
     * @param  \App\Repositories\StudentRepository  $repository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(StudentRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }
}
