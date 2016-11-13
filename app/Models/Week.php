<?php

namespace App\Models;

use Koch\Casters\Behavior\Castable;
use Koch\Filters\Behavior\Filterable;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use Filterable, Castable;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'week';

    /**
     * The primary key name.
     *
     * @var string
     */
    protected $primaryKey = 'week_id';

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
    protected $fillable = ['week_start', 'week_end', 'week_number'];

    /**
     * The attributes that are cast to dates.
     *
     * @var array
     */
    protected $dates = [
        'week_start',
        'week_end',
    ];
}
