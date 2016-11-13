<?php

namespace App\Casters;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class Caster
{
    /**
     * Cast builder instanace.
     *
     * @var \App\Casters\CastBuilder
     */
    private $builder;

    /**
     * Determines the function sign.
     *
     * @var string
     */
    private $functionSign = '@';

    /**
     * Determines the query sign.
     *
     * @var string
     */
    private $querySign = '!';

    /**
     * Class constructor.
     *
     * @param  \App\Casters\CastBuilder  $builder
     * @return void
     */
    public function __construct(CastBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Casts collection fields.
     *
     * @param  mixed  $model
     * @return array
     */
    public function cast($model)
    {
        // First we determine if given parameter is a collection
        // if so, we call this method recursively for each of the
        // results.
        if ($model instanceof Collection) {
            return $model->map([$this, 'cast']);
        }

        if (empty($model)) {
            return;
        }

        // We go through each of the specified cast rules
        // and resolve them one after another.
        foreach ($this->castRules() as $old => $desired) {
            $this->resolveCast($old, $desired, $model, $transformed);
        }

        return $transformed;
    }

    /**
     * Resolves casts based on supplied array of arguments.
     *
     * @param  string  $old
     * @param  string|Closure  $desired
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  array  &$transformed
     * @return array
     */
    private function resolveCast($old, $desired, Model $model, &$transformed)
    {
        // If there was a closure provided as a value of the array
        // run that closure and return it as a result of casting.
        if ($desired instanceof Closure) {
            return $transformed[$old] = call_user_func($desired, $model);
        }

        // If the value was prefixed with the function sign, which
        // is '@' by default, call desired method on this class.
        if (is_string($desired) && strpos($desired, $this->functionSign) !== false) {
            return $transformed[$old] = call_user_func([$this, substr($desired, 1)], $model);
        }

        // If it was prefixed with the query sign, which
        // is '!' by default, make use of the CastBuilder instance
        // and resolve the cast there.
        if (is_string($desired) && strpos($desired, $this->querySign) !== false) {
            return $this->builder->parse($old, substr($desired, 1), $model, $transformed);
        }

        // If they specified simple key - value string pairs, simply
        // rename the column, retaining the contents.
        if (is_string($old)) {
            return $transformed[$desired] = $model->$old;
        }

        // Otherwise keep unchanged.
        return $transformed[$desired] = $model->$desired;
    }

    /**
     * Returns the cast rules.
     *
     * @return array
     */
    abstract protected function castRules();
}
