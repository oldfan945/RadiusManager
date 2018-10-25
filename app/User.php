<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'apartment_id', 'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function macAddresses()
    {
        return $this->hasMany(MacAddress::class);
    }

    public function radreplies()
    {
        return $this->hasMany(Radreply::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

}
