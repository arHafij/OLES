<?php

namespace App\Services\Result;

use App\Models\Question;



class ResultCalculationService {
    private $calculateResult = 0;
    private $comments = array('bad','good','excellent');

    public function getCalculateResult($questionAndAnswer)
    {
        foreach($questionAndAnswer as $question=>$userAnswer){
            $correctAnswer  = Question::where('id',$question)->value('answer');
            if($correctAnswer == $userAnswer){
                $this->calculateResult++;
            }
        }
        return $this->calculateResult;
    }

    public function getComment($total_mark, $user_mark){
        $markInPercent = ($user_mark/$total_mark)*100;
        if($markInPercent > 79){
            return $this->comments[2];
        }
        if($markInPercent >= 50){
            return $this->comments[1];
        }
        if($markInPercent < 50){
            return $this->comments[0];
        }
    }


}
