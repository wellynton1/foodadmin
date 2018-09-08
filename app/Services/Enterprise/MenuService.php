<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 07/09/18
 * Time: 20:20
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\Menu;

class MenuService
{

    public function create($request)
    {
        return Menu::create($request->all());
    }

    public function update($id, $request)
    {
        return Menu::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return Menu::query();
    }

}