<?php

namespace App\Http\Requests\Enterprise;

use App\Models\Customer\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends FormRequest
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


    public function rules(Request $request)
    {

//        $customer = Customer::find($request->id_customer);

        return [
            'name' => 'required',
            'email' => 'required',
//            Rule::unique('users')->ignore($customer->user->id),
            'cpf' => 'required',
//            Rule::unique('customers')->ignore($customer->id),
            'whatsapp' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'O campo nome é o obrigatório!',
            'email.required' => 'O campo e-mail é o obrigatório!',
            'email.unique' => 'Já existe um usuário com este e-mail!',
            'cpf.required' => 'O campo CPF é o obrigatório!',
            'cpf.unique' => 'Já existe um usuário com este CPF!',
            'whatsapp.required' => 'O campo whatsapp é o obrigatório!',
            'phone.required' => 'O campo telefone é o obrigatório!',
            'street.required' => 'O campo logradouro é o obrigatório!',
            'district.required' => 'O campo bairro é o obrigatório!',
            'cep.required' => 'O campo cep é o obrigatório!',
            'reference_point.required' => 'O campo ponto de referência é o obrigatório!',

        ];
    }
}
