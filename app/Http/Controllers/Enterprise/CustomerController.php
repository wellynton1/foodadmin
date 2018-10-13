<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\CustomerRequest;
use App\Http\Requests\Enterprise\CustomerUpdateRequest;
use App\Http\Requests\Utilities\AddressRequest;
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

            $request->merge(['user_id' => $user->id]);

            $adress = $this->adressService->create($request->only(['street', 'district', 'cep', 'complement', 'reference_point']));

            $request->merge(['address_id' => $adress->id]);

            $customer = $this->customerService->create($request->only(['nickname', 'cpf', 'phone', 'whatsapp', 'user_id']));

            $request->merge(['customer_id' => $customer->id]);

            $this->customerAdressService->create($request->only(['customer_id', 'address_id']));
        });

        return redirect()->route('enterprise.customer.list.get')->with(['status' => 'Cliente cadastrado com sucesso!']);

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


    public function getAddress(Customer $customer)
    {

        return view('enterprise.customer.address.addressList', compact('customer'));

    }

    public function getAddressEdit($id)
    {
        $data = $this->customerAdressService->get();

        $customerAddress = $data->find($id);

        return view('enterprise.customer.address.addressEdit', compact('customerAddress'));
    }
    public function postAddressEdit(AddressRequest $request, $id)
    {

       $this->adressService->update($id, $request->only(['street', 'district', 'cep', 'complement', 'reference_point']));

       return redirect()->route('enterprise.customer.list.get')->with(['status' => 'Endereço cliente editado com sucesso!']);

    }

    public function getAddressNew(Customer $customer)
    {

        return view('enterprise.customer.address.addressNew', compact('customer'));

    }

    public function postAddressNew(AddressRequest $request, Customer $customer)
    {

        $adress = $this->adressService->create($request->only(['street', 'district', 'cep', 'complement', 'reference_point']));

        $request->merge(['customer_id' => $customer->id, 'address_id' => $adress->id]);

        $this->customerAdressService->create($request->only(['customer_id', 'address_id']));


        return redirect()->route('enterprise.customer.list.get')->with(['status' => 'Endereço cliente cadastrado com sucesso!']);

    }



}
