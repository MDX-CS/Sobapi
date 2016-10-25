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
        $required = $this->method() === 'POST' ? 'required|' : '';

        return [
            'name' => $required . 'min:5',
            'url' => $required . 'min:5',
            'level_id' => $required . 'numeric|exists:levels,id',
            'topic_id' => $required . 'numeric',
            'expected_start_date' => $required . 'date',
            'expected_completion_date' => $required . 'date|after:expected_start_date',
        ];
    }
}
