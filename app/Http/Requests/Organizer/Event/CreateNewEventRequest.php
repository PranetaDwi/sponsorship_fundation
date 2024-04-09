<?php

namespace App\Http\Requests\Organizer\Event;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponseValidationException;

class CreateNewEventRequest extends FormRequest
{
    use ApiResponseValidationException;
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'target_fund' => ['required', 'integer'],
            'sponsor_deadline' => ['required', 'date'],
            'event_start_date' => ['required', 'date'],
            'event_end_date' => ['required', 'date'],
            'event_venue' => ['required', 'string', 'max:200'],
            'address' => ['required'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
            'target_participants' => ['required', 'integer'],
            'participant_description' => ['required'],
            'status_event' => ['required', 'string', 'max:40'],
            'type_event' => ['required', 'string', 'max:40'],
            'event_category_id.*' => ['required', 'integer', 'exists:event_category_names,id'],
            'photo_file' => ['required','array', 'max:2048'],
            // mimes validation for multiple files harus dipikirin lagi
        ];
    }
}
