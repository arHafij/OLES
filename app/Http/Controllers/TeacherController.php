<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function getHome() {

    	return view('teacher.index');
    }
    public function getProfile() {
        $teacher = Auth::user();
    	return view('teacher.profile.index',compact('teacher'));
    }
}
