<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleIn extends Model
{
    protected $fillable = [
        'vehicle_id', 'department_id', 'reason', 'requires_refection'
    ];

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }
}
