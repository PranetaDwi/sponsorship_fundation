<?php

namespace App\Http\Requests\Admin\IconManagement;

use Illuminate\Foundation\Http\FormRequest;

class PostIconRequest extends FormRequest
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
            'photo_file' => 'required|string|max:40',
        ];
    }
}
