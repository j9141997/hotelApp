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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'postal'   => ['required', 'string', 'max:7'],
        'address'  => ['required', 'string', 'max:200'],
        'tel'      => ['required', 'string', 'max:20'],
        'birthday' => ['required', 'date'],
    ];

    public static $regist_rules = [
        'name'     => ['required', 'string', 'max:50'],
        'postal'   => ['required', 'string', 'max:7'],
        'address'  => ['required', 'string', 'max:200'],
        'tel'      => ['required', 'string', 'max:20'],
        'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
        'birthday' => ['required', 'date'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
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
