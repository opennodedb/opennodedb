<?php

namespace App\Transformers;

use App\Node;
use League\Fractal\TransformerAbstract;

class NodeTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['links'];

    public function transform(Node $node)
    {
        return $node->toArray();
    }

    public function includeLinks(Node $node)
    {
        return $this->collection($node->links, new LinkTransformer, 'link');
    }

}
