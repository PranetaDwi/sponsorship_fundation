<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponseValidationException;

class RegisterRequest extends FormRequest
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
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5',
                'password_confirmation' => 'required|same:password',
                'full_name' => 'required|string|regex:/^[a-zA-Z ]+$/',
                'phone' => ['required', 'numeric', 'regex:/^62\d{9,}$/'],
            ];
    }
}
