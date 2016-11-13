<?php

namespace App\Models;

use Koch\Casters\Behavior\Castable;
use App\Models\Behavior\HasTimetable;
use Koch\Filters\Behavior\Filterable;
use App\Models\Behavior\HasAttendance;
use App\Models\Behavior\HasObservations;

class Student extends User
{
    use Castable,
        Filterable,
        HasTimetable,
        HasAttendance,
        HasObservations;

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
    public function tutor()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
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
