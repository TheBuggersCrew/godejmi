<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function checkAnswer(int $answerId)
    {
        return $answerId ===
            (int)$this->answers()
                ->where('is_correct', 1)
                ->pluck('id')->first();
    }

    public static function getRandomQuestions(int $amount)
    {
        return Question::inRandomOrder()->limit($amount)->get(['id', 'content']);
    }
}
