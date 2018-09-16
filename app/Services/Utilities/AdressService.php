<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 15/09/18
 * Time: 22:34
 */

namespace App\Services\Utilities;


use App\Models\Utilities\Address;

class AdressService
{

    public function create($request)
    {
        return Address::create($request);
    }

    public function update($id, $request)
    {
        return Address::find($id)->update($request);
    }

    public function get($request = null)
    {
        return Address::query();
    }

}