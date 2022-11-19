<?php

namespace App\Http\Requests\Admin\Veterinary;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarVeterinariaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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