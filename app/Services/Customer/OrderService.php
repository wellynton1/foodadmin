<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 25/10/18
 * Time: 08:29
 */

namespace App\Services\Customer;


use App\Models\Customer\Order;

class OrderService
{
    public function create($request)
    {
        return Order::create($request);
    }

    public function update($id, $request)
    {
        return Order::find($id)->update($request);
    }

    public function get($request = null)
    {
        return Order::query();
    }
}