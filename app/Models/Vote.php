<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
}
