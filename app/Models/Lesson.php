<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    public function user(){

        return $this->belongsTo('App\Models\User');
    }

}
