<?php

namespace App\Models\Enterprise;

use App\Models\Utilities\UnitOfMeasurement;
use Illuminate\Database\Eloquent\Model;

class Feedstock extends Model
{
    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->user()->id;
            $model->active = 1;
        });

        static::updating(function ($model){
            $model->updated_by = auth()->user()->id;
        });
    }

    protected $fillable = [
        'name',
        'current_stock',
        'minimum_stock',
        'id_unit_of_measurement',
        'active',
    ];

    public function unitOfMeasurement()
    {
        return $this->hasOne(UnitOfMeasurement::class, 'id', 'id_unit_of_measurement');
    }
}
