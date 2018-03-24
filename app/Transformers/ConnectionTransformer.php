<?php

namespace App\Transformers;

use App\Connection;
use League\Fractal\TransformerAbstract;

class ConnectionTransformer extends TransformerAbstract
{
    public function transform(Connection $connection)
    {
        return $connection->toArray();
    }
}
