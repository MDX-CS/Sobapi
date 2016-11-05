<?php

namespace App\Models;

use App\Models\Sob;
use App\Models\Behavior\Filterable;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Filterable;

    /**
     * The primary key name.
     *
     * @var string
     */
    protected $primaryKey = 'topic_id';

    /**
     * Disabling the timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['topic'];

    /**
     * Specifies the has many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sobs()
    {
        return $this->hasMany(Sob::class);
    }

    /**
     * Assigns this topic to given sob
     *
     * @param  \App\Models\Sob  $sob
     * @return void
     */
    public function reassign(Sob $sob)
    {
        $sob->topic()->dissociate();
        $sob->topic()->associate($this);
        $sob->save();
    }
}
