<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\station;

class stationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        station::create([
            'name' => 'Station 1',
        ]);
        station::create([
            'name' => 'Station 2',
        ]);
        station::create([
            'name' => 'Station 3',
        ]);
    }

}
