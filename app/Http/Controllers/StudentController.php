<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Lesson;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
    	return view('student.index');
    }

    public function getProfile(){
        $student = Auth::user();
        return view('student.profile.index',compact('student'));
    }

    public function getHome()
    {
        $lessons = Lesson::orderBy('id','desc')->get();
        return view('student.index',compact('lessons'));
    }

    public function getLessons()
    {
        $lessonObj = new Lesson();
        return view('student.lesson.index',compact('lessonObj'));
    }

    public function showLesson($id)
    {
        $lessonObj = new Lesson();
        $lesson = $lessonObj->getLessonById($id);
        return view('student.lesson.show',compact('lesson','lessonObj'));
    }
}
