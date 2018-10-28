<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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

    protected $fillable = [
        'name',
        'description',
        'value_caloric',
        'type_menu_id',
        'status_menu_id',
        'value_total_sale',
        'value_total_cost',
    ];

    public function typeMenu()
    {
        return $this->belongsTo(TypeMenu::class);
    }

    public function setValueTotalSaleAttribute($value)
    {
        $value = number_format((float)$value, 2, '.', '');

        $this->attributes['value_total_sale'] = (float)$value;

    }

//    public function getValueTotalSaleAttribute($value)
//    {
//        $value = number_format((double)$value, 2, ',', '.');
//        return $this->attributes['value_total_sale'] = $value;
//
//    }

}
