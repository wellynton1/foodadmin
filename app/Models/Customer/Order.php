<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
        'customer_id',
        'customer_address_id',
        'status_order_id',
        'delivery_schedule',
        'value_total_sale',
        'value_total_cost',
        'observation',
        'descount'
    ];
}
