<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'name', 'vlan_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
