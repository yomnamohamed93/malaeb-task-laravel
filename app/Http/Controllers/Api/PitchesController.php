<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PitchAvailableSlotsRequest;
use App\Models\Pitch;
use App\Services\DateTimeService;
use Carbon\Carbon;
class PitchesController extends Controller
{

    public function checkAvailableSlots(PitchAvailableSlotsRequest $request): \Illuminate\Http\JsonResponse
    {
        $validated=$request->validated();
        $pitch=Pitch::find($validated['pitch_id']);
        $booked_slots=$pitch->bookings()->where('booking_date',$validated['booking_date'])->get(['start_time','end_time'])->toArray();

        //get all booked intervals in a 30 min interval form
        $booked_intervals=[];
        foreach ($booked_slots as $slot){
            $booked_intervals = array_merge($booked_intervals,DateTimeService::calculateSlots($slot['start_time'],$slot['end_time'],30));
        }

        //get slots after current time if date is today
        $start_time=Carbon::today()==Carbon::make($validated['booking_date'])?Carbon::now()->addHour()->format("h:0"):$pitch->stadium->working_hours_start;
        //limit end time to match stadium closing time
        $end_time=Carbon::make($pitch->stadium->working_hours_end)->subMinutes($validated['slot_duration']);
        //calculate time slots between start & end time
        $slots = DateTimeService::calculateSlots($start_time, $end_time,30);

        return response()->json(['status'=> 200,'message'=> "success",
            'data'=>array_diff($slots,$booked_intervals)],200
        );
    }
}
