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
            'location' => 'Dagupan',
        ]);
        Destination::create([
            'location' => 'Buenlag',
        ]);
        Destination::create([
            'location' => 'Calasiao',
        ]);
        Destination::create([
            'location' => 'Bonuan',
        ]);
        Destination::create([
            'location' => 'Tambac',
        ]);
        Destination::create([
            'location' => 'Tondalingan',
        ]);
        Destination::create([
            'location' => 'Lucao',
        ]);
        Destination::create([
            'location' => 'Mangin',
        ]);
        Destination::create([
            'location' => 'Binmaley',
        ]);
        Destination::create([
            'location' => 'Mangaldan',
        ]);
    }
}
