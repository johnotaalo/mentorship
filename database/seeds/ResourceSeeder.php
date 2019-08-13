<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$resources = [
    		['resource' => 'Under 5 register'],
    		['resource' => 'POXs']
    	];
        \App\Resource::insert($resources);
    }
}
