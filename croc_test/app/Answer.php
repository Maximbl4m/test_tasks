<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'answer';
    protected $fillable = ['text'];

    public function question()
    {
        return $this->hasOne('App\Question');
    }

    public function answerScores()
    {
        return $this->hasMany('App\AnswerScore');
    }
}
