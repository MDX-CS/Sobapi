<?php

namespace App\Models;

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
        return $this->belongsToMany(Sob::class, 'sob_observations', 'student_id');
    }

    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'attendance', 'studid', 'crn');
    }

    /**
     * Toggles the obsevation status of the given sob in relation with this student.
     *
     * @param  \App\Models\Sob  $sob
     * @return void
     */
    public function toggleObservation(Sob $sob)
    {
        $this->sobs()->toggle($sob);
    }

    /**
     * Toggles the attendance status of the given lesson in relation with this student.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function toggleAttendance(Lesson $lesson)
    {
        $this->lessons()->toggle($lesson);
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
