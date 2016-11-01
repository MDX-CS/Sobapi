<?php

namespace App\Policies\Behavior;

use BadMethodCallException;

trait Manageable
{
    /**
     * We want to redirect manageable methods onto the manage
     * method.
     *
     * @param  string  $method
     * @param  araray  $args
     * @return void
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, array $args)
    {
        if (in_array($method, $this->manageable)) {
            return call_user_func_array([$this, 'manage'], $args);
        }

        throw new BadMethodCallException("Method {$method} was not found on this class.");
    }
}
