<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
    	return view('student.index');
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
        return view('student.lesson.show',compact('lesson'));
    }
}
