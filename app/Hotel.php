<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

  // ホテルタイプとのリレーション
  public function type()
  {
    return $this->belongsTo('App\Type');
  }

  // 宿泊プランテーブルとのリレーション
  public function plans()
  {
    return $this->hasMany('App\Plan');
  }

  public function reviews()
  {
    return $this->hasMany('App\Review');
  }


  protected $fillable = [
    'name',
    'type_id',
    'postal',
    'address',
    'checkin_time',
    'checkout_time',
    'image',
    'hotel_exist',
  ];


  public static $mainRules = [
      'name'           => ['required', 'string', 'max:50'],
      'type_id'        => ['not_in:0', 'numeric', 'between:1,6'],
      'postal'         => ['required', 'string', 'max:7', 'min:7'],
      'address'        => ['required', 'string', 'max:200'],
      'checkin_time'   => ['required', 'date_format:H:i'],
      'checkout_time'  => ['required', 'date_format:H:i'],
  ];

  public static $imageRules = [
      'image'          => ['required', 'file', 'image', 'mimes:jpeg'],
  ];


  public static $messages = [
      'name.required'             => '名前は必須入力項目です。',
      'name.string'               => '名前は文字列で入力して下さい。',
      'name.max'                  => '名前は50文字以内で入力して下さい。',
      'type_id.not_in'            => '宿分類を選択して下さい。',
      'type_id.numeric'           => '宿分類が正しくありません。',
      'type_id.between'           => '宿分類が正しくありません。',
      'postal.required'           => '郵便番号は必須入力項目です。',
      'postal.string'             => '郵便番号は文字列で入力して下さい。',
      'postal.max'                => '郵便番号が正しくありません。',
      'postal.min'                => '郵便番号が正しくありません。',
      'address.required'          => '住所は必須入力項目です。',
      'address.string'            => '住所は文字列で入力して下さい。',
      'address.max'               => '住所は200文字以内で入力して下さい。',
      'checkin_time.required'     => 'チェックイン時間は必須入力項目です。',
      'checkin_time.date_format'  => '時間として正しくない入力です。',
      'checkout_time.required'    => 'チェックアウト時間は必須入力項目です。',
      'checkout_time.date_format' => '時間として正しくない入力です。',
      'image.required'            => '宿写真は必須項目です。',
      'image.file'                => 'ファイルがアップロードされていません。',
      'image.image'               => '画像ファイル(jpeg,png,jpg,gif)を選択して下さい。',
      'image.mimes'               => '画像ファイル(jpeg,png,jpg,gif)を選択して下さい。',
  ];
}
