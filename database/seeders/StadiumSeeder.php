<?php

namespace Database\Seeders;

use App\Models\Stadium;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stadium::insert([
            ['name' => 'Cairo International Stadium','working_hours_start'=>Carbon::parse("9am")->format('H:i:s')
            ,'working_hours_end'=>Carbon::parse("9pm")->format('H:i:s'),'slot_durations'=>json_encode([60,90])],

            ['name' => 'Egyptian Army Stadium','working_hours_start'=>Carbon::parse("12pm")->format('H:i:s')
                ,'working_hours_end'=>Carbon::parse("9pm")->format('H:i:s'),'slot_durations'=>json_encode([60,90])],

            ['name' => 'Borg El Arab Stadium','working_hours_start'=>Carbon::parse("2pm")->format('H:i:s')
                ,'working_hours_end'=>Carbon::parse("11pm")->format('H:i:s'),'slot_durations'=>json_encode([60,90])]
            ]
        );
    }
}
