<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lesson_id, $exam_id)
    {
        $lesson = Lesson::find($lesson_id);
        $exam = Exam::find($exam_id);
        $questions = Question::where('exam_id',$exam_id)->get();
        return view('teacher.question.index',compact('lesson','questions','exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($exam_id)
    {
        $total_questions = count(Question::where('exam_id',$exam_id)->get());
//        dd($total_question);
        $exam = Exam::where('id',$exam_id)->first();
        $lesson = $exam->lesson;
        return view('teacher.question.create',compact('exam','lesson','total_questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $exam_id)
    {
        $this->validate($request,[
            'name'=>'required',
            'opt_a'=>'required',
            'opt_b'=>'required',
            'opt_c'=>'required',
            'opt_d'=>'required',
            'answer'=>'required'
        ]);

        $question = new Question();
        $question->name = $request->name;
        $question->opt_a = $request->opt_a;
        $question->opt_b = $request->opt_b;
        $question->opt_c = $request->opt_c;
        $question->opt_d = $request->opt_d;
        $question->answer = $request->answer;
        $question->exam_id = $exam_id;
        $question->save();
        return redirect()->back()->with('success','Successfully added a Question. You can try more!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
