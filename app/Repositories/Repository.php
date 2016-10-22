<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
    /**
     * Validates the request.
     *
     * @return bool
     */
    public function valid()
    {
        $validator = Validator::make(request()->all(), $this->rules());

        return $validator->passes();
    }

    /**
     * Inverts the original method.
     *
     * @return bool
     */
    public function invalid()
    {
        return ! $this->valid();
    }

    /**
     * Casts collection fields.
     *
     * @param  mixed  $sob
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function cast($sob)
    {
        if ($sob instanceof Collection) {
            return $sob->map([$this, 'cast']);
        }

        $transformed = [];

        foreach ($this->casts() as $old => $desired) {
            if (is_string($old)) {
                $transformed[$desired] = $sob->$old;
            } else {
                $transformed[$desired] = $sob->$desired;
            }
        }

        return $transformed;
    }

    /**
     * Returns the validation rules.
     *
     * @return array
     */
    abstract protected function rules();

    /**
     * Returns the cast rules.
     *
     * @return array
     */
    abstract protected function casts();

}
