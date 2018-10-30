<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

    public function getDateDeliveryAttribute($value)
    {

        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDateDeliveryAttribute($value)
    {
        $value = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['date_delivery'] = $value;

    }

    protected $fillable = [
        'customer_id',
        'customer_address_id',
        'status_order_id',
        'delivery_schedule',
        'value_total_sale',
        'value_total_cost',
        'observation',
        'descount',
        'date_delivery',
        'value_order'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function statusOrder()
    {
        return $this->belongsTo(StatusOrder::class);
    }
}
