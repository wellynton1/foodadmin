<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 08/09/18
 * Time: 01:15
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\StatusMenu;

class StatusMenuService
{

    public function get()
    {
        return StatusMenu::query();
    }

}