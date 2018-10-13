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
        'user_id',
        'active'
    ];

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function addressesCustomer()
    {
        return $this->hasMany(CustomerAddress::class);
    }
}
