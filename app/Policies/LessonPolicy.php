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
     * Determine whether the user can attend lessons.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function attend(User $user)
    {
        return $user->capabilities->contains(6);
    }

    /**
     * Determine whether the user can attend lessons.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function changeTimetable(User $user)
    {
        return $user->capabilities->contains(5);
    }

    /**
     * Determine whether the user can check its own attendance.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAttended(User $user, Student $student)
    {
        return $user->getKey() === $student->getKey() || $user->type === 'staff';
    }
}
