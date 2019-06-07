<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    protected $fillable = [
        'name', 'attendant'
    ];

    public function departments()
    {
        return $this->hasMany('App\Deparments');
    }
}