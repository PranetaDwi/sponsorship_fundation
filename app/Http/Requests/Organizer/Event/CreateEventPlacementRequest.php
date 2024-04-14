<?php

namespace App\Http\Requests\Organizer\Event;

use App\Traits\ApiResponseValidationException;
use Illuminate\Foundation\Http\FormRequest;

class CreateEventPlacementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

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
            'event_start_date' => ['required', 'date', 'before_or_equal:event_end_date'],
            'event_end_date' => ['required', 'date', 'after_or_equal:event_start_date'],
            'event_venue' => ['required', 'string', 'max:200'],
            'address' => ['required'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
        ];
    }
}
