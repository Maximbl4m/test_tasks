<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = ['text'];

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }
}
