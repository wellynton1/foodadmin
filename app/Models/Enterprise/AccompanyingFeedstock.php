<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class AccompanyingFeedstock extends Model
{

    protected $fillable = ['accompanying_id', 'feedstock_id', 'amount'];

    public function feedstock()
    {
        return $this->belongsTo(Feedstock::class);
    }

}
