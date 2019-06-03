<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = [
        'country'
    ];

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function cities()
    {
        return $this->hasMany('App\Cities');
    }
}
