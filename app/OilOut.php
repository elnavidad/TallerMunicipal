<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OilOut extends Model
{
    protected $fillable = [
        'oil_id', 'vehicle_id', 'qty', 'reason'
    ];

    public function oil() {
        return $this->belongsTo('App\Oil');
    }

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }
}
