<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Models\Student;
use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class StudentSobController extends ApiController
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

    /**
     * Shows all the sobs assigned to a student.
     *
     * @param  \App\Models\Student  $student
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student = null)
    {
        if (! $student->exists) {
            return $this->responder->notFound()->send();
        }

        return $this->responder
            ->ok()
            ->withData($this->repository->cast($student->sobs))
            ->send();
    }

    /**
     * Toggles the observations status of a sob for given student.
     *
     * @param  \App\Models\Student  $student
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student = null, Sob $sob = null)
    {
        if (! $sob->exists || ! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $sob->toggleFor($student);

        return $this->responder->created()->send();
    }
}
