<?php

namespace App\Models\Behavior;

use Carbon\Carbon;
use App\Models\Week;
use App\Models\Lesson;

trait HasAttendance
{
    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attendance()
    {
        return $this->belongsToMany(Lesson::class, 'attendance', 'studid', 'crn')
            ->withPivot('week', 'loginid', 'record_timestamp');
    }

    /**
     * Toggles the attendance status of the given lesson in relation with this student.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return int|null
     */
    public function toggleAttendance(Lesson $lesson)
    {
        if ($this->attendance->contains($lesson)) {
            return $this->attendance()->detach($lesson);
        }

        return $this->attendance()->attach($lesson, [
            'week' => $this->getCorrespondingWeekId(),
            'loginid' => auth()->id(),
            'record_timestamp' => Carbon::now(),
        ]);
    }

    /**
     * Returns present week id from the school calendar.
     *
     * @return int
     */
    protected function getCorrespondingWeekId()
    {
        return Week::where('week_start', '<=', Carbon::now())
            ->orderBy('week_start', 'desc')
            ->first()->week_id;
    }
}
