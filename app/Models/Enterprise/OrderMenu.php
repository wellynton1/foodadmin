<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
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
        'order_id',
        'menu_id',
    ];
}
