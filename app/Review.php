<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable =  [
      'user_id',
      'hotel_id',
      'text'
    ];

    public static $rules = [
      'text' => ['required'],
    ];
}
