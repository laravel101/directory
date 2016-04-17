<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }
}
