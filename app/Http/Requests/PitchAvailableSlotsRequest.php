<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PitchAvailableSlotsRequest extends FormRequest
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
        return [
            'slot_duration'                    => 'required|in:60,90',
            'pitch_id'                  => 'required|numeric|exists:pitches,id',
            'booking_date'                    => 'required|after_or_equal:' . date('Y-m-d'),
        ];
    }
}
