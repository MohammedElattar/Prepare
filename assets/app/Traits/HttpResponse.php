<?php

namespace App\Traits;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

trait HttpResponse
{
    /**
     * Success Response.
     */
    public function successResponse(
        mixed $data = null,
        string $message = 'Success',
        int $code = Response::HTTP_OK,
        bool $showToast = null,
        array $additional = [],
    ): JsonResponse {
        $showToast = !is_null($showToast) ? $showToast : request()->method() != 'GET';

        return response()->json(array_merge([
            'data' => $data,
            'message' => $message,
            'type' => 'success',
            'code' => $code,
            'showToast' => $showToast,
        ], $additional), $code);
    }

    public function okResponse(
        mixed $data = null,
        string $message = 'Success',
        int $code = Response::HTTP_OK,
        bool $showToast = null,
        array $additional = [],
    ): JsonResponse {
        return $this->successResponse(
            $data,
            $message,
            $code,
            $showToast,
            $additional,
        );
    }

    public function unauthenticatedResponse(
        string $message = 'You Are not authenticated',
        int $code = Response::HTTP_UNAUTHORIZED,
               $data = null,
        bool $showToast = null,
        array $additional = [],
    ): JsonResponse {
        return $this->errorResponse(
            $data,
            $code,
            $message,
            $showToast,
            $additional,
        );
    }

    /**
     *  NotAuthenticated Response In Handler.
     *
     * @throws AuthenticationException
     */
    public function throwNotAuthenticated(): void
    {
        throw new AuthenticationException();
    }

    /**
     * Undocumented function
     */
    public function resourceResponse(
        $data,
        string $message = 'Data Fetched Successfully',
        int $code = 200,
        bool $showToast = null,
        array $additional = [],
    ): JsonResponse {
        return $this->successResponse(
            $data,
            $message,
            $code,
            $showToast,
            $additional,
        );
    }

    public function paginatedResponse(
        LengthAwarePaginator $collection,
        string $resourceClass,
        bool $isCollection = false,
        string $message = 'Data Fetched Successfully',
        int $code = Response::HTTP_OK
    ): JsonResponse {
        $data = [
            'data' => $isCollection ? new $resourceClass($collection->items()) : $resourceClass::collection($collection->items()),
            'meta' => [
                'current_page' => $collection->currentPage(),
                'from' => $collection->firstItem(),
                'last_page' => $collection->lastPage(),
                'total' => $collection->total(),
            ],
            'message' => $message,
            'code' => $code,
            'type' => 'success',
        ];

        return response()->json($data, $code);
    }

    /**
     * Forbidden Response
     */
    public function forbiddenResponse(
        string $message = 'Access Denied',
        mixed $data = null,
        int $code = Response::HTTP_FORBIDDEN,
        bool $showToast = null,
        array $additional = []
    ): JsonResponse {
        return $this->errorResponse(
            $data,
            $code,
            $message,
            $showToast,
            $additional,
        );
    }

    /**
     * Error Response
     */
    public function errorResponse(
        $data = null,
        int $code = Response::HTTP_NOT_FOUND,
        string $message = 'Error Occurred',
        bool $showToast = null,
        array $additional = [],
    ): JsonResponse {
        $response = [
            'data' => $data,
            'message' => $message,
            'type' => 'error',
            'code' => $code,
            'showToast' => is_bool($showToast) ? $showToast : request()->method() != 'GET',
        ];

        return response()->json(
            array_merge($response, $additional),
            $response['code']
        );
    }

    public function notFoundResponse(
        string $message = 'Not Found',
        array $data = null,
        int $code = Response::HTTP_NOT_FOUND,
        bool $showToast = true,
        array $additional = [],
    ): JsonResponse {
        return $this->errorResponse(
            $data,
            $code,
            $message,
            $showToast,
            $additional,
        );
    }

    public function createdResponse(
        array|JsonResource $data = null,
        string $message = 'Resource Created Successfully',
        int $code = Response::HTTP_CREATED,
        bool $showToast = true,
        array $additional = [],
    ): JsonResponse {
        return $this->successResponse(
            $data,
            $message,
            $code,
            $showToast,
            $additional,
        );
    }

    /**
     * @throws ValidationException
     */
    public function throwValidationException(
        Validator $validator,
        array $error = null,
    ): void {
        $errors = $error ?: $validator->errors()->toArray();
        $errorsKeys = array_keys($errors);
        $finalErrors = [];
        $showFirstErrorOnly = false;
        for ($i = 0; $i < count($errorsKeys); $i++) {
            if ($showFirstErrorOnly && $i == 1) {
                break;
            }

            $finalErrors[$errorsKeys[$i]] = $errors[$errorsKeys[$i]][0];
        }

        throw new ValidationException(
            $validator,
            $this->validationErrorsResponse($finalErrors)
        );
    }

    /**
     * Validation Errors Response.
     */
    public function validationErrorsResponse(
        mixed $data = null,
        int $code = Response::HTTP_UNPROCESSABLE_ENTITY,
        string $message = 'validation errors',
        bool $showToast = true,
        array $additional = [],
    ): JsonResponse {
        return $this->errorResponse(
            $data,
            $code,
            $message,
            $showToast,
            $additional,
        );
    }

    public function unauthorizedResponse($data): JsonResponse
    {
        return $this->errorResponse($data, Response::HTTP_UNAUTHORIZED, 'Wrong Credentials');
    }
}
