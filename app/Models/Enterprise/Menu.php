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
        'type_menu_id',
        'status_menu_id'
    ];

    public function typeMenu()
    {
        return $this->belongsTo(TypeMenu::class);
    }

}
