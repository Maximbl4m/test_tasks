<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'poll';
    protected $fillable = ['title', 'description'];

    public function groups() {
        return $this->belongsToMany('App\Group');
    }

    public function questions() {
        return $this->hasMany('App\Question');
    }
}
