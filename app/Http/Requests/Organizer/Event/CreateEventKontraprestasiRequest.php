<?php

namespace App\Http\Requests\Organizer\Event;

use App\Traits\ApiResponseValidationException;
use Illuminate\Foundation\Http\FormRequest;

class CreateEventKontraprestasiRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:100'],
            'min_sponsor' => ['required', 'integer'],
            'max_sponsor' => ['required', 'integer'],
            'feedback' => ['required', 'string', 'max:500'],
            'icon_photo_kontraprestasi_id' => ['required', 'integer', 'exists:icon_photo_kontraprestasis,id'],
        ];
    }
}
