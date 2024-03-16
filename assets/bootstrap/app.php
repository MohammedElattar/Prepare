<?php

//use App\Exceptions\CouldNotCalculateDistanceException;
//use App\Exceptions\DoesNotHaveBranchException;
//use App\Exceptions\DoesNotHaveDeliveryException;
//use App\Exceptions\DoesNotHaveEnoughBalanceException;
//use App\Exceptions\DoesNotHaveStoreException;
use App\Exceptions\InternalServerErrorException;
//use App\Exceptions\MapException;
//use App\Exceptions\UserHasNoWalletException;
use App\Exceptions\ValidationErrorsException;
use App\Http\Middleware\AccountMustBeActive;
use App\Http\Middleware\AlwaysAcceptJson;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\MustBeVerified;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SetDefaultLocale;
use App\Http\Middleware\TrustProxies;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Support\Str;
//use Modules\Auth\Http\Middleware\CheckUserType;
//use Modules\Auth\Http\Middleware\MustBeVerified;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global Middlewares
        $middleware->append([
            SetDefaultLocale::class,
            AlwaysAcceptJson::class,
        ]);

        $middleware->api([
            'throttle:api',
        ]);

        $middleware->use([
            TrustProxies::class,
            HandleCors::class,
            PreventRequestsDuringMaintenance::class,
            ValidatePostSize::class,
            TrimStrings::class,
            ConvertEmptyStringsToNull::class,
        ]);

        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            //'permission' => PermissionMiddleware::class,
            'account_must_be_active' => AccountMustBeActive::class,
            'must_be_verified' => MustBeVerified::class,
            'user_type_in' => CheckUserType::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $httpResponse = (new class { use \App\Traits\HttpResponse; });

//        $exceptions->renderable(
//            function (
//                DoesNotHaveStoreException|DoesNotHaveBranchException|DoesNotHaveDeliveryException $e
//            ) use ($httpResponse){
//                return $httpResponse->forbiddenResponse($e->getMessage());
//        });

        // Map Exceptions
//        $exceptions->renderable(function (MapException $exception) use($httpResponse){
//            $message = json_decode($exception->getMessage())->error->message;
//
//            if (Str::contains($message, 'out of bounds')) {
//                $message = translate_word('coordinates_out_of_bounds');
//            }
//
//            return $httpResponse->errorResponse(
//                code: Response::HTTP_BAD_REQUEST,
//                message: $message,
//            );
//        });

        // Wallet Exceptions
//        $exceptions->renderable(function (UserHasNoWalletException $e) use($httpResponse){
//            return $httpResponse->errorResponse(
//                code: Response::HTTP_BAD_REQUEST,
//                message: translate_word('user_has_no_wallet', [
//                    'name' => $e->getUser()->name,
//                ])
//            );
//        });

//        $exceptions->renderable(function (DoesNotHaveEnoughBalanceException $e) use($httpResponse){
//            return $httpResponse->errorResponse(
//                code: Response::HTTP_BAD_REQUEST,
//                message: translate_word('does_not_have_enough_balance', [
//                    'amount' => $e->getAmount(),
//                ])
//            );
//        });
//
//        $exceptions->renderable(function (CouldNotCalculateDistanceException $e) use($httpResponse){
//            return $httpResponse->errorResponse(
//                code: Response::HTTP_INTERNAL_SERVER_ERROR,
//                message: translate_word('could_not_calculate_distance'),
//            );
//        });
        // Handle Unauthorized User
        $exceptions->renderable(function (AuthenticationException $e, $req) use($httpResponse){

            return $httpResponse->unauthenticatedResponse('You are not authenticated');
        });

        $exceptions->renderable(function (ValidationErrorsException $e) use($httpResponse){
            return $httpResponse->validationErrorsResponse($e->getErrors());
        });

        $exceptions->renderable(function (InternalServerErrorException $e) use($httpResponse){
            return $httpResponse->errorResponse(message: $e->getMessage());
        });

        $exceptions->renderable(function (NotFoundHttpException $e, $req) use($httpResponse){
            $msg = $e->getMessage();

            if (Str::contains($msg, 'No query', true)) {
                $msg = translate_error_message('record', 'not_found');
            }

            return $httpResponse->errorResponse(null, Response::HTTP_NOT_FOUND, $msg);
        });

        $exceptions->renderable(function (MethodNotAllowedHttpException $e, $request) use($httpResponse){
            return $httpResponse->errorResponse(
                null,
                Response::HTTP_METHOD_NOT_ALLOWED,
                $e->getMessage()
            );
        });

        // Too Many Requests
        $exceptions->renderable(function (ThrottleRequestsException $e, $request) use($httpResponse){
            return $httpResponse->errorResponse(
                null,
                Response::HTTP_TOO_MANY_REQUESTS,
                $e->getMessage()
            );
        });

        // Don't Have Permissions

//        $exceptions->renderable(function (UnauthorizedException $e, $request) use($httpResponse){
//            return $httpResponse->forbiddenResponse(
//                translate_word('forbidden')
//            );
//        });
//
//        $exceptions->renderable(function (RestException $e) use($httpResponse){
//
//            $errorMessage = $e->getMessage();
//
//            if (Str::contains($errorMessage, '[HTTP 400] Unable to create record: Invalid parameter `To`')) {
//                $errorMessage = translate_word('phone_number_invalid');
//            } elseif (Str::match('/.* was not found$/', $errorMessage)) {
//                $errorMessage = 'code is incorrect';
//            }
//
//            return $httpResponse->errorResponse(
//                null,
//                code: Response::HTTP_INTERNAL_SERVER_ERROR,
//                message: $errorMessage,
//            );
//        });
//
//        $exceptions->renderable(function (EnvironmentException $e) use($httpResponse){
//
//            return $httpResponse->errorResponse(
//                code: Response::HTTP_INTERNAL_SERVER_ERROR,
//                message: $e->getMessage()
//            );
//        });
//
//        $exceptions->renderable(function (InvalidRequestException|InvalidArgumentException $e) {
//            $errorObject = StripeExceptionHelper::getErrorObject($e);
//
//            return (new StripeExceptionHelper())->returnStripeError($errorObject);
//        });
    })
    ->create();
