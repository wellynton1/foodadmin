<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 15/09/18
 * Time: 22:35
 */

namespace App\Services\Customer;


use App\Models\Customer\Customer;

class CustomerService
{

    public function create($request)
    {
        return Customer::create($request);
    }

    public function update($id, $request)
    {
        return Customer::find($id)->update($request);
    }

    public function get($request = null)
    {
        return Customer::query();
    }

}