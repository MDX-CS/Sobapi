<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Filters\LessonFilter;

class LessonRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\LessonFilter  $filter
     * @param  \App\Models\Lesson  $model
     * @return void
     */
    public function __construct(LessonFilter $filter, Lesson $model)
    {
        parent::__construct($filter, $model);
    }

    /**
     * Validation rules for the store action.
     *
     * @return array
     */
    public function storeRules()
    {
        return [
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'room' => 'required|min:3',
            'starttime' => 'required|regex:[0-9]{1,2}:[0-9]{2}',
            'endtime' => 'required|regex:[0-9]{1,2}:[0-9]{2}',
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
            'day' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'room' => 'min:3',
            'starttime' => 'regex:[0-9]{1,2}:[0-9]{2}',
            'endtime' => 'regex:[0-9]{1,2}:[0-9]{2}',
        ];
    }

    /**
     * The database key for this resource.
     *
     * @return array
     */
    public function databaseKey()
    {
        return 'lesson_id';
    }
}
