<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 13/10/18
 * Time: 16:12
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\AccompanyingFeedstock;

class AccompanyingFeedstockService
{
    public function create($request, $accompanying_id)
    {

            AccompanyingFeedstock::create([
                'accompanying_id' => $accompanying_id,
                'feedstock_id' => $request['feedstock_id'],
                'amount' => $request['amount']
            ]);

    }

    public function update($id, $request)
    {
        return AccompanyingFeedstock::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return AccompanyingFeedstock::query();
    }

    public function delete($id)
    {
        return AccompanyingFeedstock::find($id)->delete();
    }
}