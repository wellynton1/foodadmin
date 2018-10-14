<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 14/10/18
 * Time: 14:00
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\Protein;

class ProteinService
{

    public function create($request)
    {
        return Protein::create([
            'name' => $request['name'],
            'calorific_value' => $request['calorific_value']
        ]);
    }

    public function update($id, $request)
    {
        return Protein::find($id)->update($request);
    }

    public function get($request = null)
    {
        return Protein::query();
    }

}