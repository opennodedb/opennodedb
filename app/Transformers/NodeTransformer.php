<?php

namespace App\Transformers;

use App\Node;
use League\Fractal\TransformerAbstract;

class NodeTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['connections'];

    public function transform(Node $node)
    {
        return $node->toArray();
    }

    public function includeConnections(Node $node)
    {
        return $this->collection($node->connections, new ConnectionTransformer, 'connection');
    }
}
