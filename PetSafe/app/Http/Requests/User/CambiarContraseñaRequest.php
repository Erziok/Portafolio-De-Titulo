<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CambiarContraseñaRequest extends FormRequest
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
            'actual_password'=> 'required',
            'password'=> 'required | min: 6 | same:confirm_password',
            'confirm_password' => 'required'
        ];
    }
}
