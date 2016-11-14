<?php

namespace App\Repositories;

use App\Models\Topic;
use App\Filters\TopicFilter;

class TopicRepository extends Repository
{
    /**
     * Class constructor.
     *
     * @param  \App\Filters\TopicFilter  $filter
     * @param  \App\Models\Topic  $model
     * @return void
     */
    public function __construct(TopicFilter $filter, Topic $model)
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
            'topic' => 'required|min:3',
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
            'topic' => 'min:3',
        ];
    }

    /**
     * The database key for this resource.
     *
     * @return array
     */
    public function databaseKey()
    {
        return 'topic_id';
    }
}
