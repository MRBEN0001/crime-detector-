<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrimeFormRequest extends FormRequest
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
            'crime' => 'required',
            'crimeScene' => 'required',
            'crimeTime' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'crime.required' => 'Crime field must not be empty!',
            'crimeScene.required' => 'Crime Scene field must not be empty!',
            'crimeTime.required' => 'Crime Time field must not be empty!',
        

        ];
    }
}
