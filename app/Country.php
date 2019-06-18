<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'country', 'shipment'
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
