<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\CustomerRequest;
use App\Http\Requests\Enterprise\CustomerUpdateRequest;
use App\Models\Customer\Customer;
use App\Services\Customer\CustomerAdressService;
use App\Services\Customer\CustomerService;
use App\Services\UserService;
use App\Services\Utilities\AdressService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CustomerController extends Controller
{

    private $customerService;
    private $adressService;
    private $customerAdressService;
    private $userService;

    public function __construct(CustomerService $customerService, CustomerAdressService $customerAdressService,
                                AdressService $adressService, UserService $userService)
    {
        $this->customerAdressService = $customerAdressService;
        $this->customerService = $customerService;
        $this->adressService = $adressService;
        $this->userService = $userService;
    }

    public function getCreate()
    {

        return view('enterprise.customer.create');

    }

    public function postCreate(CustomerRequest $request)
    {

        DB::transaction(function () use($request){

            $request->merge(['password' => 'secret', 'active' => 0]);

            $user = $this->userService->create($request->only(['name', 'email', 'password', 'active']));

            $request->merge(['id_user_customer' => $user->id]);

            $adress = $this->adressService->create($request->only(['street', 'district', 'cep', 'complement', 'reference_point']));

            $request->merge(['id_address' => $adress->id]);

            $customer = $this->customerService->create($request->only(['nickname', 'cpf', 'phone', 'whatsapp', 'id_user_customer']));

            $request->merge(['id_customer' => $customer->id]);

            $this->customerAdressService->create($request->only(['id_customer', 'id_address']));
        });

        return redirect()->route('enterprise.customer.list.get')->with(['status' => 'Tipo cardápio cadastrado com sucesso!']);

    }

    public function getUpdate(Customer $customer)
    {

        return view('enterprise.customer.update', compact('customer'));

    }


    public function postUpdate(Customer $customer, CustomerUpdateRequest $request)
    {

        DB::transaction(function () use($request, $customer) {

            $this->userService->update($customer->user->id, $request->only(['name', 'email']));

            $this->customerService->update($customer->id, $request->only(['nickname', 'cpf', 'phone', 'whatsapp']));

        });


        return redirect()->route('enterprise.customer.list.get')->with(['status' => 'Cliente editado com sucesso!']);

    }

    public function getList(Request $request)
    {

        $data = $this->customerService->get();

        $customers = $data->when($request->name, function ($q) use ($request) {
            $q->whereHas('user', function ($q2)  use ($request){
                $q2->where('name', 'like', '%' . $request->name . '%');
            });

        })->when($request->cpf, function ($q) use($request){
            $q->where('cpf', $request->cpf);
        })->paginate();

        return view('enterprise.customer.list', compact('customers'));

    }

}
