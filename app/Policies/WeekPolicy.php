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
     * @return bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can manage Weeks.
     *
     * @return bool
     */
    public function manage()
    {
        return false;
    }
}
