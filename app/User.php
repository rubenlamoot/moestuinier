<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_active', 'first_name', 'last_name', 'email', 'password', 'phone', 'company', 'vat', 'newsletter', 'privacy'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function isAdmin()
    {
        if($this->isActive()){
            foreach ($this->roles as $role){
                if($role->pivot->role_id == 1){
                    return true;
                }
            }
            return false;
        }else{
            return false;
        }

    }
    public function isActive(){
        if($this->is_active == 1){
            return true;
        }else{
            return false;
        }
    }
}
