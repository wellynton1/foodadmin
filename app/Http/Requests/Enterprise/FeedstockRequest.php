<?php

namespace App\Http\Requests\Enterprise;

use Illuminate\Foundation\Http\FormRequest;

class FeedstockRequest extends FormRequest
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
            'minimum_stock' => 'required|numeric',
            'id_unit_of_measurement' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório!',
            'minimum_stock.numeric' => 'O campo estoque mínimo deve conter um valor numérico!',
            'minimum_stock.required' => 'O campo estoque mínimo é obrigatório!',
            'id_unit_of_measurement.required' => 'O campo unidade de medida é obrigatório!',
        ];
    }
}
