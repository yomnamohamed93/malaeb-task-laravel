<?php

namespace App\Models;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    public $timestamps = true;

    public function stadium()
    {
        $this->belongsTo(Stadium::class);
    }


}
