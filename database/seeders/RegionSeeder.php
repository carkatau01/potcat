<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::truncate();

        Region::create([
            'id' => 1,
            'name' => 'Херсон',
        ]);

        Region::create([
            'id' => 2,
            'name' => 'Киев',
        ]);
    }
}
