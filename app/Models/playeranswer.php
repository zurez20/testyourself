<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Any;

class Playeranswer extends Model
{
    public function result()
    {
        return $this->hasOne(Result::class, 'id', 'resultId');
    }
    public function question()
    {
        return $this->hasOne(Question::class, 'id', 'questionId');
    }
    public function selectedAnswer()
    {
        return $this->hasOne(Answer::class, 'id', 'selectedAnswerId');
    }
    public function correctAnswer()
    {
        return $this->hasOne(Answer::class, 'id', 'correctAnswerId');
    }
}
