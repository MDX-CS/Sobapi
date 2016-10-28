<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    protected $primaryKey = 'network_name';

    public $incrementing = false;

    use HasApiTokens, Notifiable;
}
