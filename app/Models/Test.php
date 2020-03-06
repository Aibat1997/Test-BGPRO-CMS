<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $primaryKey = 't_id';
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'q_test_id', 't_id');
    }
    
    public function programm()
    {
        return $this->belongsTo('App\Models\Programm', 't_programm_id', 'p_id');
    }
}
