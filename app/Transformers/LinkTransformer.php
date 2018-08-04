<?php

namespace App\Transformers;

use App\Link;
use League\Fractal\TransformerAbstract;

class LinkTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['source', 'destination'];

    public function transform(Link $link)
    {
        return $link->toArray();
    }

    public function includeSource(Link $link)
    {
        return $this->item($link->node[0], new NodeTransformer, 'node');   
    }

    public function includeDestination(Link $link)
    {
        return $this->item($link->node[1], new NodeTransformer, 'node');   
    }
}
