<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /***
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers()->pluck('text')->toArray();
    }

    public function checkAnswer(string $answer)
    {
        return $answer ==
            $this->answers()
                ->where('is_correct', 1)
                ->pluck('text')->first();
    }

    public static function getRandomQuestions(int $amount)
    {
        return Question::inRandomOrder()->limit($amount)->get(['id', 'text']);
    }
}
