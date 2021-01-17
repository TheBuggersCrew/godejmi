<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

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
        }

        return response()->json($questionsWithAnswers);
    }

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAnswers(Request $request)
    {
        $data = json_decode($request->getContent());
        $check = true;

        if(count($data) !== 5) {
            $check = false;
            $msg = 'Powinno byc 5 odpowiedzi ;]';
        } else {
            foreach($data as $answer) {
                $question = Question::findOrFail((int)$answer->id);
                if(!$question->checkAnswer((string)$answer->answer)) {
                    $check = false;
                    $msg = 'Error. Zła odpowiedź na któreś z pytań.';
                }
            }
        }

        if($check) {
            $msg = 'Odpowiedzi poprawne, jestes autoryzowanym buggerem.';
            session()->put('is_authorized', true);
        }

        return response()->json([
            'success' => $check,
            'msg' => $msg
        ]);
    }
}
