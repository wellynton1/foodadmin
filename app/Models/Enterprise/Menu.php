<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

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
