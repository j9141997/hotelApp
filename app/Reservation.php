<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'checkin_day',
        'checkout_day',
        'count'
    ];

    public static $rules = [
        'checkin_day'    => ['required', 'date', "min:date('Y-m-d', strtotime('+1 day'))", 'max:2023-09-14'],
        'checkout_day'   => ['required', 'date', "min:date('Y-m-d', strtotime('+2 day'))", 'max:2023-09-14'],
        'count'          => ['required', 'integer', "min:1"]
    ];
}
