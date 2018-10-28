<?php

namespace App\Http\Requests\Enterprise;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_id' => 'required',
            'customer_address_id' => 'required',
            'delivery_schedule' => 'required|date_format:H:i',
            'value_total_sale' => 'required',
            'date_delivery' => 'required|date_format:d/m/Y',
            'menus' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'Favor selecionar cliente',
            'customer_address_id' => 'Favor selecionar endereço do cliente',
            'delivery_schedule.required' => 'O campo melhor horário para entrega é obrigatório!',
            'delivery_schedule.date_format' => 'Formato de hora inválido!',
            'date_delivery.required' => 'O campo data de entrega é obrigatório!',
            'date_delivery.date_format' => 'Formato data de entrega é inválido!',
            'menus.required' => 'O campo cardápio é obrigatório!'
        ];
    }
}
