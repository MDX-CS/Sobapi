<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Behavior\Manageable;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
{
    use HandlesAuthorization, Manageable;

    /**
     * Manageable methods.
     *
     * @var array
     */
    protected $manageable = ['create', 'update', 'delete'];

    /**
     * Determine whether the user can view the Level.
     *
     * @return bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can manage Levels.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function manage(User $user)
    {
        return $user->capabilities->contains(2);
    }
}
