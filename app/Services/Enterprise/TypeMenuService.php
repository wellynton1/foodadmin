<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 07/09/18
 * Time: 20:21
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\TypeMenu;

class TypeMenuService
{

    public function create($request)
    {
        return TypeMenu::create($request->all());
    }

    public function update($id, $request)
    {
        return TypeMenu::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return TypeMenu::query();
    }

}