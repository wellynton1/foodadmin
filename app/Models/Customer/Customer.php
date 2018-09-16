<?php

namespace App\Models\Customer;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
        'nickname',
        'cpf',
        'phone',
        'whatsapp',
        'id_user_customer',
        'active'
    ];

    public function user()
    {

        return $this->hasOne(User::class, 'id', 'id_user_customer');

    }

    public function addressesCustomer()
    {
        return $this->hasMany(CustomerAddress::class, 'id_customer', 'id');
    }
}
