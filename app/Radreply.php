<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radreply extends Model
{

    protected $table = 'radreply';

    protected $fillable = [
        'attribute', 'op', 'value',
    ];

    public function setOpAttribute($value)
    {
        $this->attributes['op'] = '=';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
