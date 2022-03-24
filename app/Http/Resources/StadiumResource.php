<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StadiumResource extends JsonResource
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
            'name' => $this->name,
            'opening_time' => date("g:i A", strtotime($this->working_hours_start)),
            'closing_time' => date("g:i A", strtotime($this->working_hours_end)),
            'pitches'=>PitchResource::collection($this->pitches),
        ];
    }
}
