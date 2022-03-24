<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'player_name' => $this->player_name,
            'player_phone' => $this->player_phone,
            'stadium' => $this->stadium->name,
            'pitch' => $this->pitch->name,
            'slot_duration' => $this->slot_duration,
            'start_time' => date("g:i A", strtotime($this->start_time)),
            'end_time' => date("g:i A", strtotime($this->end_time)),
            'booking_date' => date("Y-m-d", strtotime($this->booking_date)),
        ];
    }
}
