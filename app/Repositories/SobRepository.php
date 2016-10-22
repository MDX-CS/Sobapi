<?php

namespace App\Repositories;

class SobRepository extends Repository
{
    /**
     * Returns the validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'sob' => 'min:5',
            'url' => 'url|min:5',
            'level_id' => 'numeric',
            'topic_id' => 'numeric',
            'expected_start_date' => 'date',
            'expected_completion_date' => 'date|after:expected_start_date',
        ];
    }

    /**
     * Returns the cast rules.
     *
     * @return array
     */
    protected function casts()
    {
        return [
            'id',
            'sob' => 'name',
            'level_id',
            'topic_id',
            'expected_start_date',
            'expected_completion_date',
            'sob_notes' => 'notes',
            'created_at',
            'updated_at',
        ];
    }
}
