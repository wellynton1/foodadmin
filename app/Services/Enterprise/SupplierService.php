<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 29/09/18
 * Time: 18:05
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\Supplier;

class SupplierService
{

    public function create($request)
    {
        return Supplier::create($request->all());
    }

    public function update($id, $request)
    {
        return Supplier::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return Supplier::query();
    }

}