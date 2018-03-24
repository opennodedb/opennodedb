<?php

namespace App\Http\Controllers\Api;

use App\Node;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use App\Http\Controllers\Controller;
use App\Transformers\NodeTransformer;
use League\Fractal\Resource\Collection;

class NodeController extends Controller
{
    private $fractal;

    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function index()
    {
        $nodes = Node::all();

        $resource = new Collection($nodes, new NodeTransformer(), 'node');
       
        $data = $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }

    public function show(Node $node)
    {
        $resource = new Item($node, new NodeTransformer(), 'node');
       
        $data = $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }
}
