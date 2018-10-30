<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'answer';

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
