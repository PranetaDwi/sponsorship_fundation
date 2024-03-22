<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'organizer_id' => ['required', 'exists:organizers,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'target_fund' => ['required', 'integer'],
            'donation_deadline' => ['required', 'date'],
            'event_date' => ['required', 'date'],
            'event_venue' => ['required', 'string', 'max:200'],
            'status_event' => ['required', 'string', 'max:40'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
        ];
    }
}
