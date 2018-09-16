<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 15/09/18
 * Time: 23:41
 */

namespace App\Services;


use App\Models\User;

class UserService
{

    public function create($request)
    {
        return User::create($request);
    }

    public function update($id, $request)
    {
        return User::find($id)->update($request);
    }

    public function get($request = null)
    {
        return User::query();
    }

}