<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class Protein extends Model
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
        'calorific_value'
    ];

    public function feedstock()
    {
        return $this->hasMany(ProteinFeedstock::class, 'protein_id', 'id');
    }
}
