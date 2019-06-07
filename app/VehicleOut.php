<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleOut extends Model
{
    protected $fillable = [
        'vehicle_id', 'reason', 'is_fixed'
    ];

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }
}
