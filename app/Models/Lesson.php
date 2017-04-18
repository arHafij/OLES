<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\exam');
    }

    public function getLessonById($id)
    {
        return Lesson::find($id);
    }

    public function getAllLessons()
    {
        return $this->all();
    }

    public function getLessonTitleByLessonId($id)
    {
        return Lesson::where('id',$id)->value('lessons_title');
    }

    public function getUserLessonsByUserId( $user_id )
    {
        return Lesson::where('user_id',$user_id)->get();
    }

}
