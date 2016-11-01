<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    /**
     * Removes timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'capability_id';

    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Staff::class, 'capability_mapping', 'capability_id');
    }
}
