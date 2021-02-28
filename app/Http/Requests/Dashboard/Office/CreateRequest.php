<?php

namespace App\Http\Requests\Dashboard\Office;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|min:4|max:64',
            'description' => 'required|min:12|max:2048',
            'director_id' => 'required|integer|min:1'
        ];
    }
}
