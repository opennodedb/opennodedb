<?php

namespace App;

class Link extends Model
{
    public function node()
    {
        return $this->belongsToMany('App\Node');
    }
}