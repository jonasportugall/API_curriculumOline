<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function messages(){
        return[
            'name.required' => 'O campo nome é obrigatório',
            
        ];
    }

    /*
            'province_id' => 'required',
            'county_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'formations' => 'required|array',
            'courses' => 'required|array',
            'experiences' => 'required|array',
            'tecnologies' => 'required|array',
            'who'=>'required',
    */

    public function rules(): array
    {
        //dd('Estou a validar');
        return[
            'name' => 'required|min:3|max:255|alpha'
        ];
        
    }

}
