<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'delivery_id', 'items', 'totalprice', 'handled'
    ];

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function address(){
        return $this->belongsTo('App\Address');
    }
}
