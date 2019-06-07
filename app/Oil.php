<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oil extends Model
{
    protected $fillable = [
        'usage', 'type', 'brand_id', 'max', 'min'
    ];

    public function brand() {
        return $this->belongsTo('App\Brand');
    }
}
