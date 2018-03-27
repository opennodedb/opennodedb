<?php

namespace App\Transformers;

use App\Connection;
use League\Fractal\TransformerAbstract;

class ConnectionTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['source', 'destination'];

    public function transform(Connection $connection)
    {
        return $connection->toArray();
    }

    public function includeSource(Connection $connection)
    {
        return $this->item($connection->source, new NodeTransformer, 'node');   
    }

    public function includeDestination(Connection $connection)
    {
        return $this->item($connection->destination, new NodeTransformer, 'node');
    }
}
