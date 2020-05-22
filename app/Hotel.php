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

  // ホテルタイプとのリレーション
  public function type()
  {
    return $this->belongsTo('App\Type');
  }

  public static $rules = [
      'name'           => ['required', 'string', 'max:50'],
      'postal'         => ['required', 'string', 'min:7', 'max:7'],
      'address'        => ['required', 'string', 'max:200'],
      'checkin_time'   => ['required', 'date'],
      'checkout_time'  => ['required', 'date'],
      'type_id'        => ['required', 'integer'],
      'image'          => ['required', 'date'],
  ];
}
