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

    public function checkAnswer(int $question_id, string $answer)
    {
        $question = Question::findOrFail($question_id);
        return $question->correctAnswer === $answer;
    }
}
