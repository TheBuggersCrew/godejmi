<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::all()->each(function (Question $question) {
            $answers = collect();

            for($i = 0; $i < 4; $i++) {
                $answer = Answer::factory()->make();
                if(!$answers->where('is_correct', true)->all()) $answer->is_correct = true;
                else $answer->is_correct = false;

                $answers->push($answer);
            }

            $question->answers()->saveMany($answers);
        });
    }
}
