<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Pitch;
use App\Services\DateTimeService;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(BookingRequest $request): \Illuminate\Http\JsonResponse
    {
        $validated=$request->validated();
        $validated['end_time']= Carbon::make($validated['start_time'])->addMinutes($validated["slot_duration"]);
        $validated=array_merge($validated,['start_time'=>Carbon::make($validated['start_time'])]);

        #------------the following validation part could be enhanced------------#
        //check if chosen time slot is valid
        $pitch=Pitch::find($validated['pitch_id']);
        $booked_slots=$pitch->bookings()->where('booking_date',$validated['booking_date'])->get(['start_time','end_time'])->toArray();
        //time intervals for chosen slots
        $new_intervals=DateTimeService::calculateSlots($validated['start_time'],$validated['end_time'],30);

        //get all booked intervals in a 30 min interval form
        $booked_intervals=[];
        foreach ($booked_slots as $slot){
            $booked_intervals = array_merge($booked_intervals,DateTimeService::calculateSlots($slot['start_time'],$slot['end_time'],30));
        }
        //check if new slots is exists in booked ones
        if(!empty(array_intersect($booked_intervals,$new_intervals))){
            return response()->json(['status'=> 422,'message'=> "Invalid time slot",
                'data'=>null],422
            );
        }
        #-----------------end of slot validation----------------#
        Booking::create($validated);
        return response()->json(['status'=> 200,'message'=> "success",
            'data'=>null],200
        );
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $data=Booking::paginate();
        return response()->json(['status'=> 200,'message'=> "success",
            'data'=>BookingResource::collection($data)]);
    }
}
