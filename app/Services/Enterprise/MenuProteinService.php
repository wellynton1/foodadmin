<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 14/10/18
 * Time: 16:36
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\MenuProtein;

class MenuProteinService
{

    public function create($request)
    {
        return MenuProtein::create($request->all());
    }

    public function update($id, $request)
    {
        return MenuProtein::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return MenuProtein::query();
    }

    public function delete($id)
    {
        return MenuProtein::find($id)->delete();
    }

}