<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }

    public function plans()
    {
        return $this->hasMany('App\Plan');
    }
}
