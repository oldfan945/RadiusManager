<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MacAddress extends Model
{
    protected $fillable = [
        'user_id', 'macaddress'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

}
