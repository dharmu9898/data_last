<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Socialite;

class User extends Authenticatable
{
    use Notifiable;

    public function role()
        {
            return $this->belongsTo('App\Role');
        }

        function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }

    function requesthelp()
    {
        return $this->hasMany(Requesthelp::class);
    }

    public function getCountry()
    {
      return $this->hasOne('App\Country','id','country');
    }
    public function getState()
    {
      return $this->hasOne('App\State','id','state');
    }
    public function getCity()
    {
      return $this->hasOne('App\City','id','city');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
