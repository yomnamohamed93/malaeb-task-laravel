<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $table='stadiums';
    protected $casts=['slot_durations'=>'array'];

    public function pitches(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Pitch::class);
    }

}
