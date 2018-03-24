<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    public function connections()
    {
        return $this->hasMany(Connection::class, 'source_id')->orWhere('destination_id', $this->id);
    }

    public function connectTo(Node $node, string $technology) : Connection
    {
        return Connection::create([
            'source_id' => $this->id,
            'destination_id' => $node->id,
            'technology' => $technology,
        ]);
    }
}
