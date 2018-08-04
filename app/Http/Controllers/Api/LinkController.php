<?php

namespace App\Http\Controllers\Api;

use App\Link;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use App\Http\Controllers\Controller;
use App\Transformers\LinkTransformer;
use League\Fractal\Resource\Collection;

class LinkController extends Controller
{
    private $fractal;

    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function index()
    {
        $links = Link::with('node')->with('node.status')->whereHas('node.status', function ($q) {
            $q->where('name', '=', 'OPERATIONAL');
        })->get();

        $activeLinks = [];
        foreach($links as $link) {
            if($link->node[0]->status->name == 'OPERATIONAL' && $link->node[1]->status->name == 'OPERATIONAL') {
                $activeLinks[] = $link;
            }
        }

        $resource = new Collection($activeLinks, new LinkTransformer(), 'link');
        
        $data = $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }

    public function show(Link $link)
    {
        $resource = new Item($link, new LinkTransformer(), 'link');
       
        $data = $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }
}
