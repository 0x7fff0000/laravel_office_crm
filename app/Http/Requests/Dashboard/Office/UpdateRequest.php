<?php

namespace App\Http\Requests\Dashboard\Office;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user();
        return (bool)$user->offices->where('creator_id', $user->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'min:4|max:64',
            'description' => 'min:12|max:2048',
            'director_id' => 'integer|min:1'
        ];
    }
}
