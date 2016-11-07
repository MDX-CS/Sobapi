<?php

namespace App\Models;

use Koch\Casters\Behavior\Castable;
use Koch\Filters\Behavior\Filterable;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use Filterable, Castable;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'CRNlist';

    /**
     * The primary key name.
     *
     * @var string
     */
    protected $primaryKey = 'crn_id';

    /**
     * Disabling the timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'attendance', 'crn', 'studid');
    }
}
