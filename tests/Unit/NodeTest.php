<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Node;

class NodeTest extends TestCase
{
    use RefreshDatabase;

    public function testNodesCanBeConnected()
    {
        $node1 = factory(Node::class)->create();
        $node2 = factory(Node::class)->create();

        $node1->connectTo($node2, 'ACPTP');

        $this->assertCount(1, $node1->connections);
        $this->assertCount(1, $node2->connections);
    }

}
