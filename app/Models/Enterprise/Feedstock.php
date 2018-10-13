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
        'unit_of_measurement_id',
        'active',
    ];

    public function unitOfMeasurement()
    {
        return $this->belongsTo(UnitOfMeasurement::class);
    }
}
