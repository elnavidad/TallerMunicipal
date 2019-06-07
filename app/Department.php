<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'attendant', 'dependency_id'
    ];

    public function dependency()
    {
        return $this->belongsTo('App\Dependency');
    }
}
