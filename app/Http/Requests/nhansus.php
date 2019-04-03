<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nhansus extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:nhansus|max:255',
            'phone' => 'required|unique:nhansus|max:255',
            'email' => 'required|unique:nhansus|max:255',
        ];
    }
}
