<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level2Category extends Model
{
    //
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $fillable = ['name', 'level1_category_id'];

    protected $softCascade = ['levels3'];

    public function level1 ()
    {
        return $this->belongsTo('App\Level1Category', 'level1_category_id');
    }

    public function levels3()
    {
        return $this->hasMany('App\Level3Category');
    }
}
