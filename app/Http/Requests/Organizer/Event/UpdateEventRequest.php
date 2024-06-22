<?php

namespace App\Http\Requests\Organizer\Event;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponseValidationException;

class UpdateEventRequest extends FormRequest
{
    use ApiResponseValidationException;
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
            'title_event' => ['required', 'string', 'max:255'],
            'type_event' => ['required', 'string', 'max:40', 'in:offline,online'],
            'status_event' => ['required', 'string', 'max:40', 'in:publish,unpublish'],
            'description' => ['required'],
            'target_participants' => ['required', 'integer'],
            'participant_category' => ['required', 'array', 'max:40'],
            'participant_description' => ['required'],
            'photo_file' => ['array', 'max:2048'],
            'event_category_id.*' => ['required', 'integer', 'exists:event_category_names,id'],
            'target_fund' => ['required', 'integer'],
            'sponsor_deadline' => ['required', 'date'],
            'event_start_date' => ['required', 'date', 'before_or_equal:event_end_date'],
            'event_end_date' => ['required', 'date', 'after_or_equal:event_start_date'],
            'event_venue' => ['required', 'string', 'max:200'],
            'address' => ['required'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
        ];
    }
}
