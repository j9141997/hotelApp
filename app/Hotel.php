<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

  // 宿泊プランテーブルとのリレーション
  public function plans()
  {
    return $this->hasMany('App\Plan');
  }

  public static $rules = [
      'name'           => ['required', 'string', 'max:50'],
      'postal'         => ['required', 'string', 'max:7'],
      'address'        => ['required', 'string', 'max:200'],
      'checkin_time'   => ['required', 'date'],
      'checkout_time'  => ['required', 'date'],
      'image'          => ['required', 'date'],
  ];
}
