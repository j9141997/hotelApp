<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    protected $fillable =  [
      'user_id',
      'hotel_id',
      'text'
    ];

    public static $rules = [
      'text' => ['required', 'max:200'],
    ];
}
