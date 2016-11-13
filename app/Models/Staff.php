<?php

namespace App\Models;

use Koch\Casters\Behavior\Castable;
use Koch\Filters\Behavior\Filterable;

class Staff extends User
{
    use Filterable, Castable;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'staffs';

    /**
     * Returns the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'staff_id';
    }

    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function capabilities()
    {
        return $this->belongsToMany(Capability::class, 'capability_mapping', 'staff_id');
    }

    /**
     * Specifies the has many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tutees()
    {
        return $this->hasMany(Student::class, 'staff_id', 'staff_id');
    }
}
