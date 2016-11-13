<?php

namespace App\Models\Behavior;

use App\Models\Lesson;

trait HasTimetable
{
    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function timetable()
    {
        return $this->belongsToMany(Lesson::class, 'student_timetable', 'student_number', 'crn');
    }

    /**
     * Toggles given lesson's presence on this student's timetable.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return array
     */
    public function toggleTimetable(Lesson $lesson)
    {
        return $this->timetable()->toggle($lesson);
    }
}
