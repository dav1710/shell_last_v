<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'address' => 'required',
            'address_am' => 'required',
            'address_ru' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'fb_link' => 'required',
            'insta_link' => 'required',
            'ld_link' => 'required',
            'tw_link' => 'required',
        ];
    }
}
