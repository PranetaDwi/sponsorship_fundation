<?php

namespace App\Traits;

use App\Http\Responses\ApiResponse;

trait ApiResponseValidationException
{
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void
    {
        $response = new ApiResponse('error', __('validation.message.validation_error'), $validator->errors(), 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}