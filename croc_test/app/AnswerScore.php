<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerScore extends Model
{
    protected $table = 'answer_score';
    protected $fillable = ['group_id', 'score'];

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
