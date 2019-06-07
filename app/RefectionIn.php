<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefectionIn extends Model
{
    protected $fillable = [
        'refection_id', 'requisition_id', 'qty', 'unit_cost'
    ];

    public function refection() {
        return $this->belongsTo('App\Refection');
    }
}
