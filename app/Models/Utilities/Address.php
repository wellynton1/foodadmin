<?php

namespace App\Models\Utilities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
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
        'street',
        'district',
        'cep',
        'complement',
        'reference_point',
        'active',
        'id_city'
    ];
}
