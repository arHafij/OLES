<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function lesson(){
        return $this->belongsTo('App\Models\lesson');
    }

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }
}
