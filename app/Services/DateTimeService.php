<?php

namespace App\Services;

use Carbon\CarbonPeriod;

class DateTimeService
{
    public static function calculateSlots($start,$end,$interval): array
    {
        $period = new CarbonPeriod($start, $end,$interval.' minutes');
        $slots = [];
        foreach($period as $item){
            $slots[] = $item->format("h:i A");
        }
        return $slots;
    }
}
