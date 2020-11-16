<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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

    /**
     * @param string $answer
     * @return bool
     */
    public function checkAnswer(string $answer)
    {
        return $answer ===
            $this->answers()
                ->where('is_correct', 1)
                ->pluck('text')->first();
    }

    /**
     * @param int $amount
     * @return mixed
     */
    public static function getRandomQuestions(int $amount)
    {
        return Question::inRandomOrder()->limit($amount)->get(['id', 'text']);
    }
}
