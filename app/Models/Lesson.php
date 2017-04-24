<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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

    public function votes(){

        return $this->hasMany('App\Models\Vote');
    }

    public function getLessonsByKeyword( $keyword ){
        return DB::table('lessons')->where('lessons_title','LIKE',"%{$keyword}%")->get();
    }

    public function getAllExamsByLessonId($id){
        return Lesson::find($id)->exams;
    }

    public function isPaymentableLesson($id)
    {
        $lesson = $this->getLessonById($id);
        if($lesson->lessons_price > 0.00){
            return true;
        }
        return false;
    }

    public function getHalfContentLessonById($id){
        $lesson = $this->getLessonById($id);
        $half_lesson_length = strlen($lesson->lessons_body)/2;
        return substr($lesson->lessons_body, 0 ,$half_lesson_length);
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
