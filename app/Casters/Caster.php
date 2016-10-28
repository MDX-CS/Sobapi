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
        if ($model instanceof Collection) {
            return $model->map([$this, 'cast']);
        }

        $transformed = [];

        foreach ($this->castRules() as $old => $desired) {
            list($key, $value) = $this->resolveCast($old, $desired, $model);

            $transformed[$key] = $value;
        }

        return $transformed;
    }

    /**
     * Resolves casts based on supplied array of arguments.
     *
     * @param  string  $old
     * @param  string|Closure  $desired
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return array
     */
    private function resolveCast($old, $desired, Model $model)
    {
        if ($desired instanceof Closure) {
            return [$old, call_user_func($desired, $model)];
        }

        if (is_string($desired) && strpos($desired, $this->functionSign) !== false) {
            return [$old, call_user_func([$this, substr($desired, 1)], $model)];
        }

        if (is_string($desired) && strpos($desired, $this->querySign) !== false) {
            return $this->builder->parse($old, substr($desired, 1), $model);
        }

        if (is_string($old)) {
            return [$desired, $model->$old];
        }

        return [$desired, $model->$desired];
    }

    /**
     * Returns the cast rules.
     *
     * @return array
     */
    abstract protected function castRules();
}
