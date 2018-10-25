<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nas extends Model
{
    protected $table = "nas";

    protected $fillable = [
        'name', 'secret', 'ipaddress', 'description'
    ];
}
