<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    // 予約テーブルとのリレーション
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    // ホテルテーブルとのリレーション
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
