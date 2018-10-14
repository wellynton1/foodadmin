<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 13/10/18
 * Time: 16:11
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\Accompanying;

class AccompanyingService
{

    public function create($request)
    {
        return Accompanying::create([
            'name' => $request['name'],
            'calorific_value' => $request['calorific_value']
        ]);
    }

    public function update($id, $request)
    {
        return Accompanying::find($id)->update($request);
    }

    public function get($request = null)
    {
        return Accompanying::query();
    }

}