<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = ['name', 'discount', 'percentage', 'times_price'];

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
