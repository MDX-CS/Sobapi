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

        $this->authorize('view-observed', [
            $this->repository->modelName(),
            $student,
        ]);

        return $this->responder
            ->ok()
            ->withData($this->repository->cast($student->sobs))
            ->send();
    }

    /**
     * Observes a sob for given student.
     *
     * @param  \App\Models\Student  $student
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student = null, Sob $sob = null)
    {
        $this->authorize('observe', $this->repository->modelName());

        if (! $sob->exists || ! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $student->complete($sob);

        return $this->responder->created()->send();
    }

    /**
     * Unobserves a sob for given student.
     *
     * @param  \App\Models\Student  $student
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student = null, Sob $sob = null)
    {
        $this->authorize('observe', $this->repository->modelName());

        if (! $sob->exists || ! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $stdent->unobserve($sob);

        return $this->responder->created()->send();
    }
}
