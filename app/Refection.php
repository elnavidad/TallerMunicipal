<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refection extends Model
{
    protected $fillable = [
        'description', 'brand_id', 'model', 'min', 'max'
    ];

    public function brand() {
        return $this->belongsTo('App\Brand');
    }
}
