<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Casters\LessonCaster;
use App\Filters\LessonFilter;

class LessonRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Casters\LessonCaster  $caster
     * @param  \App\Filters\LessonFilter  $filter
     * @param  \App\Models\Lesson  $model
     * @return void
     */
    public function __construct(LessonCaster $caster, LessonFilter $filter, Lesson $model)
    {
        parent::__construct($caster, $filter, $model);
    }

    /**
     * Validation rules for the store action.
     *
     * @return array
     */
    public function storeRules()
    {
        return [
            //
        ];
    }

    /**
     * Validation rules for the update action.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            //
        ];
    }
}
