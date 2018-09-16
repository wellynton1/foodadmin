<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 14/09/18
 * Time: 09:07
 */

namespace App\Services\Enterprise;


use App\Models\Utilities\UnitOfMeasurement;

class UnitOfMeasurementService
{

    public function get()
    {
        return UnitOfMeasurement::query();
    }

}