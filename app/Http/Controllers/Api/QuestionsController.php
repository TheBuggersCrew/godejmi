<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function getQuestionsWithAnswers()
    {
        $questions = Question::getRandomQuestions(5);
        $questionsWithAnswers = [];
        foreach($questions as $question) {
           $questionsWithAnswers[$question->id] = $this->getAnswers($question->id);
        }
        return response()->json($questionsWithAnswers);
    }

    public function getAnswers(int $question_id)
    {
        return Question::findOrFail($question_id)->answers;
    }

    // {question_id: answer_id}, eg.: {"4":"8", "5":"1", "2": "5", "7": "15"}
    public function checkAnswers(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $check = 1;

        foreach($data as $question_id => $answer_id) {
            $question = Question::findOrFail($question_id);
            if(!$question->checkAnswer($answer_id)) {
                $check = 0;
            }
        }
        return response()->json([
            'success' => $check
        ]);
    }

    private function validateData($data) // TODO: implement data validation - is this necessary?
    {
        return Validator::make($data, [
            'answers' => 'required'
        ]);
    }
}
