<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level3Category extends Model
{
    //
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $fillable = ['name', 'level2_category_id'];

    public function level2 ()
    {
        return $this->belongsTo('App\Level2Category', 'level2_category_id');
    }
}
