<?php

namespace App\Models;

use App\Models\Behavior\Filterable;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Specifies the one to many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sobs()
    {
        return $this->hasMany(Sob::class);
    }
}
