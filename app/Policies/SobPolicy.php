<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use App\Policies\Behavior\Manageable;
use Illuminate\Auth\Access\HandlesAuthorization;

class SobPolicy
{
    use HandlesAuthorization, Manageable;

    /**
     * Manageable methods.
     *
     * @var array
     */
    protected $manageable = ['create', 'update', 'delete'];

    /**
     * Determine whether the user can view the sob.
     *
     * @return bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can manage sobs.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function manage(User $user)
    {
        return $user->capabilities->contains(2);
    }

    /**
     * Determine whether the user can observe sobs.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function observe(User $user)
    {
        return $user->capabilities->contains(3);
    }

    /**
     * Determines whether the user can view observed sobs.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return bool
     */
    public function viewObserved(User $user, Student $student)
    {
        return $user->getKey() === $student->getKey() || $user->type === 'staff';
    }
}
