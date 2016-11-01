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
