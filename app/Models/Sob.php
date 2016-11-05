<?php

namespace App\Models;

use App\Models\Behavior\Filterable;
use Illuminate\Database\Eloquent\Model;

class Sob extends Model
{
    use Filterable;

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
    protected $primaryKey = 'sob_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sob',
        'url',
        'level_id',
        'topic_id',
        'expected_start_date',
        'expected_completion_date',
        'sob_notes',
    ];

    /**
     * The attributes that are cast to dates.
     *
     * @var array
     */
    protected $dates = [
        'expected_start_date',
        'expected_completion_date',
    ];

    /**
     * Specifies the belongs to many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'sob_observations', 'sob_id');
    }

    /**
     * Specifies the belongs to relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Specifies the belongs to relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
