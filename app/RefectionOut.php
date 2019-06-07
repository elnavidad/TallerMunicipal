<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefectionOut extends Model
{
    protected $fillable = [
        'refection_id', 'vehicle_id', 'qty', 'reason'
    ];

    public function refection() {
        return $this->belongsTo('App\Refection');
    }

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }
}
