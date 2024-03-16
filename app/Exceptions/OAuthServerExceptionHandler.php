<?php

namespace App\Exceptions;

use App\Http\Responses\ApiResponse;
use Exception;
use Laravel\Passport\Exceptions\MissingScopeException;

class OAuthServerExceptionHandler extends Exception
{
    public function render($request, \Throwable $exception)
    {
        if ($exception instanceof MissingScopeException) {
            return new ApiResponse('error', 'forbidden', null, 403);
        }

        return parent::render($request, $exception);
    }
}
