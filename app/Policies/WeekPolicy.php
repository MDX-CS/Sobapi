<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Behavior\Manageable;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeekPolicy
{
    use HandlesAuthorization, Manageable;

    /**
     * Manageable methods.
     *
     * @var array
     */
    protected $manageable = ['create', 'update', 'delete'];

    /**
     * Determine whether the user can view the Week.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can manage Weeks.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function manage(User $user)
    {
        return false;
    }
}
