<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded;

    public function stadium(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }
    public function pitch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Pitch::class);
    }
}
