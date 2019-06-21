<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = ['name', 'discount', 'percentage'];

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
