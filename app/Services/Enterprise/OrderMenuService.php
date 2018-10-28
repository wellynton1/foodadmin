<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 25/10/18
 * Time: 08:39
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\OrderMenu;

class OrderMenuService
{
    public function create($request)
    {
        return OrderMenu::create($request);
    }

    public function update($id, $request)
    {
        return OrderMenu::find($id)->update($request);
    }

    public function get($request = null)
    {
        return OrderMenu::query();
    }
}