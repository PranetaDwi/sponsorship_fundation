<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException as AuthAuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Laravel\Passport\Exceptions\MissingScopeException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthAuthenticationException $exception)
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthenticated',
        ], 401);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MissingScopeException) {
            return (new OAuthServerExceptionHandler())->render($request, $exception);
        }

        return parent::render($request, $exception);
    }
}
