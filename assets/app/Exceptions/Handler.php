<?php

namespace App\Exceptions;

use App\Traits\HttpResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Str;
use Modules\Payment\Helpers\StripeExceptionHelper;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Stripe\Exception\InvalidArgumentException;
use Stripe\Exception\InvalidRequestException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Twilio\Exceptions\EnvironmentException;
use Twilio\Exceptions\RestException;

class Handler extends ExceptionHandler
{
    use HttpResponse;

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
        // Handle Unauthorized User
        $this->renderable(function (AuthenticationException $e, $req) {

            return $this->unauthenticatedResponse('You are not authenticated');
        });

        $this->renderable(function (NotFoundHttpException $e, $req) {
            $msg = $e->getMessage();

            if (Str::contains($msg, 'No query', true)) {
                $msg = translate_error_message('record', 'not_found');
            }

            return $this->errorResponse(null, Response::HTTP_NOT_FOUND, $msg);
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return $this->errorResponse(
                null,
                Response::HTTP_METHOD_NOT_ALLOWED,
                $e->getMessage()
            );
        });

        // Too Many Requests
        $this->renderable(function (ThrottleRequestsException $e, $request) {
            return $this->errorResponse(
                null,
                Response::HTTP_TOO_MANY_REQUESTS,
                $e->getMessage()
            );
        });

        // Don't Have Permissions

        $this->renderable(function (UnauthorizedException $e, $request) {
            return $this->forbiddenResponse(
                translate_word('forbidden')
            );
        });

        $this->renderable(function (RestException $e) {

            $errorMessage = $e->getMessage();

            if (Str::contains($errorMessage, '[HTTP 400] Unable to create record: Invalid parameter `To`')) {
                $errorMessage = translate_word('phone_number_invalid');
            } elseif (Str::match('/.* was not found$/', $errorMessage)) {
                $errorMessage = 'code is incorrect';
            }

            return $this->errorResponse(
                null,
                code: Response::HTTP_INTERNAL_SERVER_ERROR,
                message: $errorMessage,
            );
        });

        $this->renderable(function (EnvironmentException $e) {

            return $this->errorResponse(
                code: Response::HTTP_INTERNAL_SERVER_ERROR,
                message: $e->getMessage()
            );
        });

        $this->renderable(function (InvalidRequestException|InvalidArgumentException $e) {
            $errorObject = StripeExceptionHelper::getErrorObject($e);

            return (new StripeExceptionHelper())->returnStripeError($errorObject);
        });
    }
}
