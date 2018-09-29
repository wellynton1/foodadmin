<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 29/09/18
 * Time: 18:56
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\Brand;

class BrandService
{

    public function create($request)
    {
        return Brand::create($request->all());
    }

    public function update($id, $request)
    {
        return Brand::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return Brand::query();
    }

}