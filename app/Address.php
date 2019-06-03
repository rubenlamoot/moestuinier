<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'street', 'house_nr', 'bus_nr', 'city_id', 'country_id'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
