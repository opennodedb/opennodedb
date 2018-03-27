<?php

namespace App;

class Connection extends Model
{
    public function source()
    {
        return $this->belongsTo(Node::class, 'source_id');
    }

    public function destination()
    {
        return $this->belongsTo(Node::class, 'destination_id');
    }

}
