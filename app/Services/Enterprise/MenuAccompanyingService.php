<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 14/10/18
 * Time: 16:35
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\MenuAccompanying;

class MenuAccompanyingService
{

    public function create($request)
    {
        return MenuAccompanying::create($request->all());
    }

    public function update($id, $request)
    {
        return MenuAccompanying::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return MenuAccompanying::query();
    }

    public function delete($id)
    {
        return MenuAccompanying::find($id)->delete();
    }

}