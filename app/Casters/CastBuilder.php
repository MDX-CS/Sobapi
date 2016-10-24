<?php

namespace App\Casters;

use Illuminate\Database\Eloquent\Model;

class CastBuilder
{
    /**
     * Builds up the cast query.
     *
     * @param  string  $old
     * @param  string  $query
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return array
     */
    public function parse($old, $query, Model $model)
    {
        $key = $old;
        $value = $model->$old;

        foreach (explode('|', $query) as $command) {
            list($function, $args) = explode(':', $command);

            $args = array_merge([$key, $value, $model], explode(',', $args));

            list($key, $value) = call_user_func_array([$this, $function], $args);
        }

        return [$key, $value];
    }

    /**
     * Adjusts the name of given field.
     *
     * @param  string  $key
     * @param  string  $value
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $newName
     * @return array
     */
    protected function name($key, $value, Model $model, $newName)
    {
        return [$newName, $value];
    }

    /**
     * Adjusts the data type of given field.
     *
     * @param  string  $key
     * @param  string  $value
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $type
     * @return array
     */
    protected function type($key, $value, Model $model, $type)
    {
        settype($value, $type);

        return [$key, $value];
    }
}
