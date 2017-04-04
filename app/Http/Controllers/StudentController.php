<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $lessons = Lesson::all();
    	return view('student.index',compact('lessons'));
    }
}
