<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = ['city', 'zip_code', 'country_id'];

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
