<?php

namespace App\Http\Requests\Admin\Publication;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPublicacionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'incidentDate'=>'required',
            'description'=>'required',
            'active'=>'required',
            'category_id'=>'required',
            'photo'=>'required',

            'name'=>'required',
            'breed_id'=>'required',
            'gender'=>'required',
            
        ];
    }
}
