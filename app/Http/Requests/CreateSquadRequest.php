<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSquadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'squadName' => 'required|string|max:255',
            'squadLeader' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'squadName.required' => 'Field must not be empty!',
            'squadLeader.required' => 'Field must not be empty!',
            'squadName.string' => 'Must be alphabetic characters!',
            'squadLeader.string' => 'Must be alphabetic characters!',
        
        ];
    }
}
