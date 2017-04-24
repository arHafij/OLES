<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
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
        'first_name','last_name', 'email', 'password','role_id','degree'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){

        return $this->belongsTo('App\Models\Role');
    }

    public function lessons(){

        return $this->hasMany('App\Models\Lesson');
    }

    public function votes(){

        return $this->hasMany('App\Models\Vote');
    }

    public function privileges() {
      return $this->belongsToMany('App\privilege');
    }

    public function getUserName(){
        return $this->first_name. " ".$this->last_name;
    }
}
