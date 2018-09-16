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

        static::updating(function ($model){
            $model->updated_by = auth()->user()->id;
            return true;
        });
    }

    protected $fillable = [
        'name',
        'description',
        'value_caloric',
        'id_type_menu',
        'id_status_menu'
    ];

    public function type()
    {
        return $this->hasOne(TypeMenu::class,'id', 'id_type_menu');
    }

}
