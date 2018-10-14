<?php

namespace App\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;

class ProteinFeedstock extends Model
{
    protected $fillable = [
        'protein_id',
        'feedstock_id',
        'amount'
    ];

    public function feedstock()
    {
        return $this->belongsTo(Feedstock::class);
    }
}
