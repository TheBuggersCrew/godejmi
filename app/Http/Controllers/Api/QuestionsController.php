<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function get()
    {
        $questions = [];
        return response()->json(
            Question::inRandomOrder()->limit(5)->get(['id', 'content'])
        );
    }

    public function getAnswers($question_id)
    {
//        dd(Question::find($question_id)->answers);
        dd(Answer::find($question_id)->question);
    }

    // {"answers": [{"id": 1, "test": "yes"}, {"id": 2, "test": "yes"}, {"id": 3, "test": "yes"}]}
    public function check(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $validation = $this->validateData($data);

        if($validation->fails()) {
            return response()->json($validation->errors());
        } else {
            Question::check();
        }
    }

    private function validateData($data)
    {
        return Validator::make($data, [
            'answers' => 'required'
        ]);
    }
}
