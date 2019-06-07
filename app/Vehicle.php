<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'dependency_id', 'economic_number', 'plate', 'serial_number', 'brand_id', 'model', 'year'
    ];

    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function dependency() {
        return $this->belongsTo('App\Dependency');
    }
}
