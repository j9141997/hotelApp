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

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    // 残り部屋数をカウントする
    public function countRoom()
    {
      $count = $this->room;
      foreach ($this->reservations as $reservation) {
         $count = $count - $reservation->count;
      }
      return $count;
    }


    protected $fillable = [
      'hotel_id',
      'name',
      'price',
      'room',
      'plan_exist',
    ];


    public static $rules = [
      'hotel_id'  => ['not_in:0', 'numeric', 'digits:10'],
      'name'      => ['required', 'string', 'max:50'],
      'price'     => ['required', 'numeric', 'min:0'],
      'room'      => ['required', 'numeric', 'min:0'],
    ];


    public static $messages = [
      'hotel_id.not_in'    => '宿名を選択して下さい。',
      'hotel_id.numeric'   => '宿名の選択が正しくありません。',
      'hotel_id.digits'    => '宿名の選択が正しくありません。',
      'name.required'      => 'プラン名は必須入力項目です。',
      'name.string'        => 'プラン名は文字列で入力して下さい。',
      'name.max'           => 'プラン名は50文字以内で入力して下さい。',
      'price.required'     => '金額は必須入力項目です。',
      'price.numeric'      => '金額は数字で入力して下さい。',
      'price.min'          => '金額は非負で入力して下さい。',
      'room.required'      => '部屋数は必須入力項目です。',
      'room.numeric'       => '部屋数は数字で入力して下さい。',
      'room.min'           => '部屋数は非負で入力して下さい。',
    ];
}
