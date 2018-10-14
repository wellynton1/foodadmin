<?php

namespace App\Http\Requests\Enterprise;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'value_caloric' => 'required|numeric',
            'type_menu_id' => 'required',
            'status_menu_id' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'O campo nome é obrigatório!',
            'description.required' => 'O campo descrição é obrigatório!',
            'value_caloric.required' => 'O campo valor calórico é obrigatório!',
            'value_caloric.numeric' => 'O campo valor calórico deve conter um valor numérico!',
            'type_menu_id.required' => 'O campo tipo menu é obrigatório!',
            'status_menu_id.required' => 'O campo status menu é obrigatório!',

        ];
    }
}
