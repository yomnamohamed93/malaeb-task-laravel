<?php

namespace App\Http\Requests;

use App\Models\Stadium;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $stadium_pitches_ids=Stadium::find($this->stadium_id)->pitches()->pluck('id')->toArray();
        return [
            'player_name'                      => 'sometimes|max:255',
            'player_phone'                    => 'required',
            'start_time'                    => 'required',
            'booking_date'                    => 'required|after_or_equal:' . date('Y-m-d'),
            'slot_duration'                    => 'required|in:60,90',
            'pitch_id'                  => 'required|numeric|exists:pitches,id|in:'.implode(",", $stadium_pitches_ids),
            'stadium_id'                  => 'required|numeric|exists:stadiums,id',
        ];
    }
}
