<?php

namespace App;

class Node extends Model
{
    public function sourceConnections()
    {
        return $this->hasMany(Connection::class, 'source_id');
    }

    public function connections()
    {
        return $this->sourceConnections()->orWhere('destination_id', $this->id);
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
