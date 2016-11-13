<?php

namespace App\Http\Controllers\Api;

use App\Models\Lesson;
use App\Models\Student;
use App\Http\Responder\Responder;
use App\Repositories\LessonRepository;

class TimetableController extends Controller
{
    /**
     * Class constructor.
     *
     * @param  \App\Repositories\LessonRepository  $repository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(LessonRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }

    /**
     * Shows the given student's timetable.
     *
     * @param  \App\Models\Student|null  $student
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student = null)
    {
        $this->authorize('view', $this->repository->modelName());

        if (! $student->exists) {
            return $this->responder->notFound()->send();
        }

        return $this->responder
            ->ok()
            ->withData($student->timetable()->cast())
            ->send();
    }

    /**
     * Adds given lesson to given student's timetable.
     *
     * @param  \App\Models\Student|null  $student
     * @param  \App\Models\Lesson|null  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student = null, Lesson $timetable = null)
    {
        $this->authorize('change-timetable', $this->repository->modelName());

        if (! $timetable->exists || ! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $student->toggleTimetable($timetable);

        return $this->responder->accepted()->send();
    }
}
