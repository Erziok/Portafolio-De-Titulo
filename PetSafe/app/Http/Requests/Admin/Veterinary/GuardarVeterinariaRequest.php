<?php

namespace App\Http\Requests\Admin\Veterinary;

use Illuminate\Foundation\Http\FormRequest;

class GuardarVeterinariaRequest extends FormRequest
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
            'name'=>'required',
            'description'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'benefit_id'=>'required',
        ];
    }
}