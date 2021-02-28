<?php

namespace App\Http\Requests\Dashboard\Office\Unit;

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
        $user = auth()->user();
        return (bool)$user->offices()->where('creator_id', $user->id)->orWhere('director_id', $user->id);
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
            'address' => 'required|min:6|max:64'
        ];
    }
}
