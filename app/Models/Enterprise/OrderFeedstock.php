<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class OrderFeedstock extends Model
{

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->user()->id;
            $model->active = 1;
            return true;
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id;
            return true;
        });
    }

    protected $table = 'order_feedstocks';

    protected $fillable = [
        'order_id',
        'feedstock_id',
        'amount'
    ];


    public function feedstock()
    {
        return $this->belongsTo(Feedstock::class);
    }

}
