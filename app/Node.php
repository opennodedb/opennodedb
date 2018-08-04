<?php

namespace App;

class Node extends Model
{
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function link()
    {
        return $this->belongsToMany('App\Link');
    }
}
