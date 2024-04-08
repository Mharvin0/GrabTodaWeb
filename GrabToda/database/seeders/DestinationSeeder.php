<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        Destination::create([
            'location' => 'Malimgas Public Market',
        ]);
        Destination::create([
            'location' => 'SM Dagupan',
        ]);
        Destination::create([
            'location' => 'PHINMA Upang',
        ]);
        Destination::create([
            'location' => 'Lyceum',
        ]);
        Destination::create([
            'location' => 'Tondalingan Beach',
        ]);
        Destination::create([
            'location' => 'Unibersidad de Dagupan',
        ]);
        Destination::create([
            'location' => 'CSI Lucao Mall',
        ]);
        Destination::create([
            'location' => 'Region 1 Medical Center',
        ]);
        Destination::create([
            'location' => 'St.John the Evangelist Cathedral',
        ]);
        Destination::create([
            'location' => 'University of Luzon',
        ]);
        Destination::create([
            'location' => 'CSI Market Square',
        ]);
        Destination::create([
            'location' => 'Nepo Mall',
        ]);
        Destination::create([
            'location' => 'Eternal Gardens Memorial Park',
        ]);
        Destination::create([
            'location' => 'Star Plaza',
        ]);
        Destination::create([
            'location' => 'Nazareth General Hospital',
        ]);
        Destination::create([
            'location' => 'Dagupan Bus Terminal',
        ]);
        Destination::create([
            'location' => 'Dagupan City National High School',
        ]);
        Destination::create([
            'location' => 'Luzon Medical Center',
        ]);
        Destination::create([
            'location' => 'Dagupan City National High School',
        ]);
        Destination::create([
            'location' => 'St. Albert the Great School',
        ]);
        Destination::create([
            'location' => 'City Mall Mayombo',
        ]);
    }
}
