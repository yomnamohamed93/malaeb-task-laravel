<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PitchResource;
use App\Http\Resources\StadiumResource;
use App\Models\Pitch;
use App\Models\Stadium;

class PitchesController extends Controller
{

    public function index()
    {

       $data=Stadium::all();
       return (StadiumResource::collection($data));
    }

}
