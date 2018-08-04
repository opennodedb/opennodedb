<?php

namespace App;

class Status extends Model
{
    public function node()
    {
        return $this->hasMany('App\Node');
    }
}