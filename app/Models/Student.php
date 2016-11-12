<?php

namespace App\Models;

use Carbon\Carbon;

class Student extends User
{
    /**
     * Returns the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'student_id';
    }

    /**
     * Specifies the belongs to relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sobs()
    {
        return $this->belongsToMany(Sob::class, 'sob_observations', 'student_id')
            ->withPivot('observation_notes', 'observed_by', 'observed_on');
    }

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
     * Toggles the obsevation status of the given sob in relation with this student.
     *
     * @param  \App\Models\Sob  $sob
     * @return int|null
     */
    public function toggleObservation(Sob $sob)
    {
        if ($this->sobs->contains($sob)) {
            return $this->sobs()->detach($sob);
        }

        return $this->sobs()->attach($sob, [
            'observed_by' => auth()->id(),
            'observed_on' => Carbon::now(),
        ]);
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
            'loginid' => auth()->id(),
            'record_timestamp' => Carbon::now(),
        ]);
    }

    /**
     * Just need to implement this function here, since student has no
     * capabilities, but I still need to call this function not knowing
     * whether it is a Student or a Staff intance - bad design of the DB.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCapabilitiesAttribute()
    {
        return collect([]);
    }

    /**
     * Same here.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function capabilities()
    {
        return collect([]);
    }
}
