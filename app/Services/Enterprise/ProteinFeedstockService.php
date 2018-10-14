<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 14/10/18
 * Time: 14:00
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\ProteinFeedstock;

class ProteinFeedstockService
{

    public function create($request, $protein_id)
    {
        ProteinFeedstock::create([
            'protein_id' => $protein_id,
            'feedstock_id' => $request['feedstock_id'],
            'amount' => $request['amount']
        ]);
    }

    public function update($id, $request)
    {
        return ProteinFeedstock::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return ProteinFeedstock::query();
    }

    public function delete($id)
    {
        return ProteinFeedstock::find($id)->delete();
    }

}