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

    protected $fillable = [
      'hotel_id',
      'name',
      'price',
      'room',
      'plan_exist',
    ];

    public static $rules = [
      'hotel_id'  => ['required', 'numeric', 'digits:10'],
      'name'      => ['required', 'string', 'max:50'],
      'price'     => ['required', 'numeric', 'min:0'],
      'room'      => ['required', 'numeric', 'min:0'],
    ];

    public static $messages = [
      'hotel_id.required'  => 'ホテルIDは必須入力項目です。',
      'hotel_id.numeric'   => 'ホテルIDは数字で入力して下さい。',
      'hotel_id.digits'    => 'ホテルIDは10桁で入力して下さい。',
      'name.required'      => '名前は必須入力項目です。',
      'name.string'        => '名前は文字列で入力して下さい。',
      'name.max'           => '名前は50文字以内で入力して下さい。',
      'price.required'     => '価格は必須入力項目です。',
      'price.numeric'      => '価格は数字で入力して下さい。',
      'price.min'          => '価格は非負で入力して下さい。',
      'room.required'      => '部屋数は必須入力項目です。',
      'room.numeric'       => '部屋数は数字で入力して下さい。',
      'room.min'           => '部屋数は非負で入力して下さい。',
    ];
}
