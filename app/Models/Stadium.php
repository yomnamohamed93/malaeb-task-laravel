<?php

namespace App\Models;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $table='stadiums';
    protected $casts=['slot_durations'=>'array'];

    public function pitches(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Pitch::class);
    }

    public function getSlots($duration=60): array
    {
        $period = new CarbonPeriod($this->working_hours_start, $this->working_hours_end,$duration.' minutes'); // for create use 24 hours format later change format
        $slots = [];
        foreach($period as $item){
            $slots[] = $item->format("h:i A");
        }

        return $slots;
    }
}
