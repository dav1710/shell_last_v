<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question_am' => 'required',
            'question_ru' => 'required',
            'question_en' => 'required',
            'answer_am' => 'required',
            'answer_ru' => 'required',
            'answer_en' => 'required',
        ];
    }
}
