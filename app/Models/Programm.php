<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programm extends Model
{
    protected $primaryKey = 'p_id';
    protected $guarded = [];

    public function tests()
    {
        return $this->hasMany('App\Models\Test', 't_programm_id', 'p_id');
    }
}
