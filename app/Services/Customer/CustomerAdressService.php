<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 15/09/18
 * Time: 23:10
 */

namespace App\Services\Customer;


use App\Models\Customer\CustomerAddress;

class CustomerAdressService
{


    public function create($request)
    {
        return CustomerAddress::create($request);
    }

    public function update($id, $request)
    {
        return CustomerAddress::find($id)->update($request);
    }

    public function get($request = null)
    {
        return CustomerAddress::query();
    }

}