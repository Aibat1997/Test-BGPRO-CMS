<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $primaryKey = 'q_id';
    protected $guarded = [];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'a_question_id', 'q_id');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Test', 'q_test_id', 't_id');
    }
}
