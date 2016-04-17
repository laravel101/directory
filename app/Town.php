<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
