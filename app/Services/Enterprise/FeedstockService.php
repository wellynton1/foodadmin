<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 12/09/18
 * Time: 12:14
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\Feedstock;

class FeedstockService
{

    public function create($request)
    {
        return Feedstock::create($request->all());
    }

    public function update($id, $request)
    {
        return Feedstock::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return Feedstock::query();
    }

}