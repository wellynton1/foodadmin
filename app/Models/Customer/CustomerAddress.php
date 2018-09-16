<?php

namespace App\Models\Customer;

use App\Models\Utilities\Address;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
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
        'id_customer',
        'id_address',
        'active'
    ];


    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'id_address');
    }
}
