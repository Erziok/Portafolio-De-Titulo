<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarServicioRequest extends FormRequest
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
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'description'=>'required',
            'service_type_id'=>'required',
        ];
    }
}
