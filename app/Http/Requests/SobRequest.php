<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
}
