<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lesson_id)
    {
        $examObj = new Exam();
        $lesson = Lesson::find($lesson_id);
        $exams = Exam::where('lesson_id',$lesson_id)->get();
        return view('teacher.exam.index',compact('exams', 'lesson','examObj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        return view('teacher.exam.create',compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$lesson_id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);


        $exam = new Exam();
        $exam->name = $request->name;
        $exam->lesson_id = $lesson_id;
        $exam->save();
        return redirect()->route('exams',$lesson_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $counter = 0;
        $exam = Exam::find($id)->first();
        $lesson = Lesson::where('id',$exam->lesson_id)->first();
        $total_questions = count(Question::where('exam_id',$id)->get());
        $questions = Exam::find($id)->questions;
        return view('teacher.exam.show',compact('lesson','exam','questions','counter','total_questions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
