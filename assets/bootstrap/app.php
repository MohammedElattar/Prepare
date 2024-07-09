<?php

use App\Exceptions\InternalServerErrorException;
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
use Modules\Role\Helpers\PermissionExceptionHelper;
use Modules\Role\Http\Middleware\PermissionMiddleware;
use Modules\Tenant\Helpers\TenantExceptionHelper;
use Modules\Tenant\Helpers\TenantMiddlewareHelper;
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
//            'permission' => PermissionMiddleware::class,
            'account_must_be_active' => AccountMustBeActive::class,
            'must_be_verified' => MustBeVerified::class,
            //'user_type_in' => CheckUserType::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $httpResponse = (new class
        {
            use \App\Traits\HttpResponse;
        });

        // Handle Unauthorized U
        $exceptions->renderable(function (AuthenticationException $e, $req) use ($httpResponse) {

            return $httpResponse->unauthenticatedResponse('You are not authenticated');
        });

        $exceptions->renderable(function (ValidationErrorsException $e) use ($httpResponse) {
            return $httpResponse->validationErrorsResponse($e->getErrors());
        });

        $exceptions->renderable(function (InternalServerErrorException $e) use ($httpResponse) {
            return $httpResponse->errorResponse(message: $e->getMessage());
        });

        $exceptions->renderable(function (NotFoundHttpException $e, $req) use ($httpResponse) {
            $msg = $e->getMessage();

            if (Str::contains($msg, 'No query', true)) {
                $msg = translate_error_message('record', 'not_found');
            }

            return $httpResponse->errorResponse(null, Response::HTTP_NOT_FOUND, $msg);
        });

        $exceptions->renderable(function (MethodNotAllowedHttpException $e, $request) use ($httpResponse) {
            return $httpResponse->errorResponse(
                null,
                Response::HTTP_METHOD_NOT_ALLOWED,
                $e->getMessage()
            );
        });

        // Too Many Requests
        $exceptions->renderable(function (ThrottleRequestsException $e, $request) use ($httpResponse) {
            return $httpResponse->errorResponse(
                null,
                Response::HTTP_TOO_MANY_REQUESTS,
                'You sent too many requests, try after a while'
            );
        });
    })
    ->create();
