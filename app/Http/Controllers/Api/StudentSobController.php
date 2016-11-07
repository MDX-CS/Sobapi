<?php

namespace App\Http\Controllers\Api;

use App\Models\Sob;
use App\Models\Student;
use App\Casters\SobCaster;
use App\Http\Responder\Responder;
use App\Repositories\SobRepository;

class StudentSobController extends Controller
{
    /**
     * The Caster instance.
     *
     * @var \App\Casters\SobCaster
     */
    protected $caster;

    /**
     * Class constructor.
     *
     * @param  \App\Casters\SobCaster  $caster
     * @param  \App\Repositories\SobRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(SobCaster $caster, SobRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);

        $this->caster = $caster;
    }

    /**
     * Shows all the sobs assigned to a student.
     *
     * @param  \App\Models\Student  $student
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
            ->withData($this->caster->cast($student->sobs))
            ->send();
    }

    /**
     * Toggles observation status for the given sob in relation with the given student.
     *
     * @param  \App\Models\Student  $student
     * @param  \App\Models\Sob  $sob
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student = null, Sob $sob = null)
    {
        $this->authorize('observe', $this->repository->modelName());

        if (! $sob->exists || ! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $student->toggleObservation($sob);

        return $this->responder->accepted()->send();
    }
}
