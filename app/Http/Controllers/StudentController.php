<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Lesson;
use App\Models\Exam;
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

    public function getExamQuestions($id)
    {

        $exam = Exam::find($id);
        $lesson = $exam->lesson;

        $questions = $exam->questions;
        $total_questions = count($questions);
        // dd($questions);
        $counter = 0;
        return view('student.question.index',compact('lesson','exam','questions','counter','total_questions'));
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
