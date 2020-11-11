<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;

class QuestionsController extends Controller
{
    /***
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function getQuestionsWithAnswers()
    {
        $questions = Question::getRandomQuestions(5);
        $questionsWithAnswers = [];

        foreach($questions as $question) {
           array_push($questionsWithAnswers,
               array(
                   'id' => $question->id,
                   'text' => $question->text,
                   'answers' => $question->getAnswers()
                )
           );

           session()->push('question_ids', $question->id);
        }

        return response()->json($questionsWithAnswers);
    }

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAnswers(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $check = 1;

        if(count($data) < 4) {
            $check = 0;
            $msg = 'Powinny byc 4 odpowiedzi ;]';
        }
        dd(session()->get('question_ids'));
        foreach($data as $question_id => $answer_id) {
            $question = Question::findOrFail($question_id);
            if(!$question->checkAnswer($answer_id)) {
                $check = 0;
            }
        }

        if($check) {
            $msg = 'Odpowiedzi poprawne, jestes autoryzowanym buggerem.';
            session(['is_authorized' => true]);
        }

        return response()->json([
            'success' => (bool)$check,
            'msg' => $msg
        ]);
    }

    private function validateData($data) // TODO: implement data validation - is this necessary?
    {
        return Validator::make($data, [
            'answers' => 'required'
        ]);
    }
}
