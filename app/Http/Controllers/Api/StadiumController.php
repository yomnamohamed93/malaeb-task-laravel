<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StadiumResource;
use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data=Stadium::paginate();
        return response()->json(['status'=> 200,'message'=> "success",
            'data'=>StadiumResource::collection($data)]);
    }

    public function show(Stadium $stadium)
    {
        return response()->json(['status'=> 200,'message'=> "success",
            'data'=>new StadiumResource($stadium)]);
    }
}
