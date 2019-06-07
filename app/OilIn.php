<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OilIn extends Model
{
    protected $fillable = [
        'oil_id', 'qty', 'unit_cost'
    ];

    public function oil() {
        return $this->belongsTo('App\Oil');
    }

}
