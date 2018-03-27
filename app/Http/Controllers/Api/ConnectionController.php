<?php

namespace App\Http\Controllers\Api;

use App\Connection;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use App\Http\Controllers\Controller;
use App\Transformers\ConnectionTransformer;
use League\Fractal\Resource\Collection;

class ConnectionController extends Controller
{
    private $fractal;

    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function index()
    {
        $connections = Connection::all();

        $resource = new Collection($connections, new ConnectionTransformer(), 'connection');
       
        $data = $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }

    public function show(Connection $connection)
    {
        $resource = new Item($connection, new ConnectionTransformer(), 'connection');
       
        $data = $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }
}
