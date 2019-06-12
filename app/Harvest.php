<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    //
    protected $fillable = ['product_id', 'jan', 'feb', 'mar', 'apr', 'mai', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'];
}
