<?php

namespace App\Http\Middleware;

use App\Traits\HttpResponse;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Modules\Auth\Actions\LogoutUser;
use Modules\Role\Enums\UserStatusEnum;
use Symfony\Component\HttpFoundation\Response;

class AccountMustBeActive
{
    use HttpResponse;

    /**
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            $this->throwNotAuthenticated();
        }

        if (UserStatusEnum::isInActive(auth()->user())) {
            (new LogoutUser())->handle();

            return $this->errorResponse(
                null,
                Response::HTTP_FORBIDDEN,
                translate_error_message('user', 'frozen'),
                ['verified' => true]
            );
        }

        return $next($request);
    }
}
