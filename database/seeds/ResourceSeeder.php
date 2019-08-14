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
        $resources = ['Under 5 register', 'POXs', 'Weighing scale','Height board','Thermometer','Oxygen cylinder', 'Nasal prongs', 'IMNCI guidelines', 'Paed protocols', 'Stat dose', 'Job Aids', 'Paed. Admission Record','Baby Anne', 'NG Tubes', 'IV /IM treatment ', 'Newborn Admission Record', 'Newborn Register', 'Infant warmer', 'Incubator', 'Maternity register' ];

        $insertData = collect($resources)->map(function($resource){
            return ['resource' => $resource];
        })->toArray();

    	\App\Resource::truncate();
        \App\Resource::insert($insertData);
    }
}
