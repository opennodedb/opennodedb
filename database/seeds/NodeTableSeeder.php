<?php

use App\Node;
use Illuminate\Database\Seeder;

class NodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goonwood = Node::create([
            'name' => 'Goonwood',
            'lat' => -34.8927475,
            'lng' => 138.5163473,
            'mast_height' => 10,
        ]);

        $goonmansion = Node::create([
            'name' => 'Goonmansion',
            'lat' => -34.8741764,
            'lng' => 138.5095477,
            'mast_height' => 10,
        ]);

        $goonmansion->connectTo($goonwood, 'ACPTP');
    }
}
