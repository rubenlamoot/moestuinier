<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level2Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'level1_category_id'];

    public function level1 ()
    {
        return $this->belongsTo('App\Level1Category', 'level1_category_id');
    }
}
