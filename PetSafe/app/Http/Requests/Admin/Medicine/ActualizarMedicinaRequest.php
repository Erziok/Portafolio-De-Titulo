<?php

namespace App\Http\Requests\Admin\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarMedicinaRequest extends FormRequest
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
            'name' => 'required',
            'activeSubstance' => 'required',
            'function' => 'required',
            'implementation' => 'required',
            'laboratory' => 'required',
            'specie' => 'required | alpha',
            'price' => 'required',
            'discount' => 'required',
            'benefit_id' => 'required',
        ];
    }
}
