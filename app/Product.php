<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['level2_category_id', 'name', 'description', 'price', 'photo', 'stock', 'new', 'sow_id', 'harvest_id'];

    public function types(){
        return $this->belongsToMany('App\Type');
    }

    public function level2 ()
    {
        return $this->belongsTo('App\Level2Category', 'level2_category_id');
    }

    public function sow(){
        return $this->belongsTo('App\Sow', 'sow_id');
    }

    public function harvest(){
        return $this->belongsTo('App\Harvest', 'harvest_id');
    }
}
