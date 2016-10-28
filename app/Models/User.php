<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'network_name';

    /**
     * State that the primary key is not incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
