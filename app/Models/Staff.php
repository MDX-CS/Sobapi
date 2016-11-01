<?php

namespace App\Models;

class Staff extends User
{
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
    public function students()
    {
        return $this->hasMany(Student::class, 'staff_id', 'staff_id');
    }
}
