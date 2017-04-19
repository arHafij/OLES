<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter = 0;
        $lessons = Lesson::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('teacher.lesson.index',compact('lessons','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('teacher.lesson.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'lessons_title'=>'required',
            'lessons_body'=>'required',
            'lessons_subject_name'=>'required',
        ]);

        $lesson = new Lesson();
        $lesson->lessons_title = $request->lessons_title;
        $lesson->lessons_body = strip_tags($request->lessons_body);
        $lesson->lessons_subject_name = $request->lessons_subject_name;
        $lesson->lessons_price = $request->lessons_price;
        $lesson->user_id = Auth::id();
        $lesson->save();
        return redirect()->route('lessons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('teacher.lesson.show',['lesson'=>$lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return view('teacher.lesson.edit',['lesson'=>$lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->lessons_title = $request->lessons_title;
        $lesson->lessons_body = strip_tags($request->lessons_body);
        $lesson->lessons_subject_name = $request->lessons_subject_name;
        $lesson->save();
        return redirect()->back()->with('success','Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        $lessons = Lesson::all();
        return response($lessons,200);
    }
}
