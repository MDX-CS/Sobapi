<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Behavior\Manageable;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization, Manageable;

    /**
     * Manageable methods.
     *
     * @var array
     */
    protected $manageable = ['create', 'update', 'delete'];

    /**
     * Determine whether the user can view the Student.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can manage Students.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function manage(User $user)
    {
        return $user->capabilities->contains(5);
    }
}
