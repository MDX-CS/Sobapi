<?php

namespace App\Http\Controllers\Api;

use App\Models\Lesson;
use App\Models\Student;
use App\Http\Responder\Responder;
use App\Repositories\LessonRepository;

class AttendanceController extends Controller
{
    /**
     * Class constructor.
     *
     * @param  \App\Repositories\LessonRepository  $respository
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(LessonRepository $repository, Responder $responder)
    {
        parent::__construct($repository, $responder);
    }

    /**
     * Show all attendance of given student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student = null)
    {
        if (! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $this->authorize('view-attended', [
            $this->repository->modelName(),
            $student,
        ]);

        return $this->responder
            ->ok()
            ->withData($student->attendance()->cast())
            ->send();
    }

    /**
     * Toggles attendance status for the given lesson in relation with the given student.
     *
     * @param  \App\Models\Student  $student
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student = null, Lesson $lesson = null)
    {
        $this->authorize('attend', $this->repository->modelName());

        if (! $lesson->exists || ! $student->exists) {
            return $this->responder->notFound()->send();
        }

        $student->toggleAttendance($lesson);

        return $this->responder->accepted()->send();
    }
}
