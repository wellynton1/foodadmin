<?php

namespace App\Http\Requests\Utilities;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'street' => 'required',
            'district' => 'required',
            'cep' => 'required',
            'reference_point' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'street.required' => 'O campo logradouro é o obrigatório!',
            'district.required' => 'O campo bairro é o obrigatório!',
            'cep.required' => 'O campo cep é o obrigatório!',
            'reference_point.required' => 'O campo ponto de referência é o obrigatório!'
        ];
    }
}
