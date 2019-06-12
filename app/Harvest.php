<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    //
    protected $fillable = ['jan', 'feb', 'mar', 'apr', 'mai', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
