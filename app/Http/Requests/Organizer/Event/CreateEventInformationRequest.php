<?php

namespace App\Http\Requests\Organizer\Event;

use App\Traits\ApiResponseValidationException;
use Illuminate\Foundation\Http\FormRequest;

class CreateEventInformationRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'type_event' => ['required', 'string', 'max:40'],
            'status_event' => ['required', 'string', 'max:40'],
            'description' => ['required'],
            'target_participants' => ['required', 'integer'],
            'participant_description' => ['required'],
            'photo_file' => ['required','array', 'max:2048'],
        ];
    }
}
