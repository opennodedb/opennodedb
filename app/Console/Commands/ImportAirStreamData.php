<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Node;

class ImportAirStreamData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opennodedb:import:airstream {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Air-Stream data from the JSON dump';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->argument('file');

        if(!is_file($file))
        {
            $this->error('Invalid File');
        }

        $status = [
        ];

        $data = json_decode(file_get_contents($file), true);

        // First pass, create nodes.
        foreach($data as $node)
        {
            Node::create([
                'id' => $node['id'],
                'name' => $node['name'],
                'lat' => $node['lat'],
                'lng' => $node['lng'],
                'status' => 'Online',
                'mast_height' => 1,
            ]);
        }

        // Second pass, links
        foreach($data as $node)
        {
            foreach($node['links'] as $link) {
                $ids = json_decode($link['fromTo']);
                Node::find($ids[0])->connectTo(Node::find($ids[1]), 'Wireless');
            }
        }

    }
}
