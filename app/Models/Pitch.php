<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    public $timestamps = true;

    public function stadium(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Stadium::class);
    }

    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class);
    }

}
