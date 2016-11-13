<?php

namespace App\Models\Behavior;

use Carbon\Carbon;
use App\Models\Sob;

trait HasObservations
{
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
}
