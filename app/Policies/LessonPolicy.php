<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use App\Policies\Behavior\Manageable;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization, Manageable;

    /**
     * Manageable methods.
     *
     * @var array
     */
    protected $manageable = ['create', 'update', 'delete'];

    /**
     * Determine whether the user can view the lesson.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can manage lessons.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function check(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can observe lessons.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    // public function observe(User $user)
    // {
    //     return $user->capabilities->contains(3);
    // }
}
