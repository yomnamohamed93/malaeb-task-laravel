<?php

namespace Database\Seeders;

use App\Models\Pitch;
use Illuminate\Database\Seeder;

class PitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pitch::insert([
            ['name' => 'CIS Pitch 1', 'stadium_id' => 1],
            ['name' => 'CIS Pitch 2', 'stadium_id' => 1],
            ['name' => 'CIS Pitch 3', 'stadium_id' => 1],

            ['name' => 'EAS Pitch 1', 'stadium_id' => 2],
            ['name' => 'EAS Pitch 2', 'stadium_id' => 2],
            ['name' => 'EAS Pitch 3', 'stadium_id' => 2],

            ['name' => 'BES Pitch 1', 'stadium_id' => 3],
            ['name' => 'BES Pitch 2', 'stadium_id' => 3],
            ['name' => 'BES Pitch 3', 'stadium_id' => 3]
            ]
        );
    }
}
