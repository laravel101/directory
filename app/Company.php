<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function town()
    {
        return $this->belongsTo('App\Town');
    }

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
