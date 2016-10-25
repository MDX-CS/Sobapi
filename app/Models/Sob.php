<?php

namespace App\Models;

use App\Models\Behavior\Filterable;
use Illuminate\Database\Eloquent\Model;

class Sob extends Model
{
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'level_id',
        'topic_id',
        'expected_start_date',
        'expected_completion_date',
        'description',
    ];

    /**
     * The attributes that are cast to dates.
     *
     * @var array
     */
    protected $dates = [
        'expected_start_date',
        'expected_completion_date',
        'updated_at',
        'created_at',
    ];

    /**
     * Specifies the one to many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
