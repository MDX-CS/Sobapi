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
     * Observes given sob for this student. Not that we
     * HAVE to stick with the word 'comlpete' since 'observed'
     * is reserved
     *
     * @param  \App\Models\Sob  $sob
     * @return void
     */
    public function complete(Sob $sob)
    {
        $this->sobs()->attach($sob);
    }

    /**
     * Unbserves given sob for this student.
     *
     * @param  \App\Models\Sob  $sob
     * @return void
     */
    public function unobserve(Sob $sob)
    {
        $this->sobs()->detach($sob);
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
