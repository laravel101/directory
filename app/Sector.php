<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    public function parent()
    {
        return $this->belongsTo('App\Sector', 'parent_id');
    }

    public function subs()
    {
        return $this->hasMany('App\Sector', 'parent_id');
    }
}
