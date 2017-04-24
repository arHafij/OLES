<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Services\Result\ResultCalculationService;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public $resultCalculationService;

    public function __construct(ResultCalculationService $service)
    {
        $this->resultCalculationService = $service;
    }

    public function store(Request $request){

        //get only question and answer key value pair
        $questionAndAnswerKeyValue = $request->except(['_token','exam_id']);

        $result = new Result();
        $result->total_mark = count(Question::where('exam_id',$request->exam_id)->get());
        $result->user_mark =  $this->resultCalculationService->getCalculateResult($questionAndAnswerKeyValue);
        $result->exam_id = $request->exam_id;
        $result->comment = $this->resultCalculationService->getComment($result->total_mark, $result->user_mark);
        $result->user_id = Auth::id();
        $result->save();
        return redirect()->route('result.show',$result->id);
    

    }

    public function show($id)
    {
        $result = Result::find($id);
        return view(
            'student.result.show',
            ['user_mark'=> $result->user_mark,'total_mark'=>$result->total_mark,'comment'=>$result->comment]
        );
    }
}
