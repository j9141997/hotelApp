<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    protected $fillable = [
        'name',
        'postal',
        'address',
        'tel',
        'email',
        'birthday',
        'password',
    ];

    public static $rules = [
        'name'     => ['required', 'string', 'max:50'],
        'postal'   => ['required', 'integer', 'digits:7'],
        'address'  => ['required', 'string', 'max:200'],
        'tel'      => ['required', 'string', 'digits_between:8,20'],
        'birthday' => ['required', 'date'],
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
