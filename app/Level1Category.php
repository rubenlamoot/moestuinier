<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level1Category extends Model
{
    //
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $fillable = ['name'];

    protected $softCascade = ['level2'];

    public function level2 (){
        return $this->hasMany('App\Level2Category');
    }
}
