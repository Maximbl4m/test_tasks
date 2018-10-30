<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'poll';

    public function groups() {
        return $this->belongsToMany('App\Group');
    }
}
