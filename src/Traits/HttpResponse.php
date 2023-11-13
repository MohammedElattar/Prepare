<?php

namespace Elattar\Prepare\Traits;

use Elattar\Prepare\Helpers\RequestHelper;
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
    public function okResponse(
        mixed $data = null,
        string $message = 'Success',
        int $code = Response::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'type' => 'success',
            'code' => $code,
            'showToast' => request()->method() != 'GET',
        ], $code);
    }

    /**
     * Response With Cookie.
     */
    public function responseWithCookie(
        mixed $cookie,
        mixed $data = null,
        string $message = 'message',
        string $type = 'success',
        int $code = 200
    ): JsonResponse {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'type' => $type,
            'code' => $code,
        ], $code)->withCookie($cookie);
    }

    public function unauthenticatedResponse(
        string $message = 'You Are not authenticated',
        int $code = Response::HTTP_UNAUTHORIZED,
        $data = null
    ): JsonResponse {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'type' => 'error',
            'code' => $code,
        ], $code);
    }

    /**
     *  NotAuthenticated Response In Handler.
     *
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
        int $code = 200
    ): JsonResponse {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'code' => $code,
            'type' => 'success',
        ], $code);
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
            'links' => [
                'first' => $collection->url(1),
                'last' => $collection->url($collection->lastPage()),
                'next' => $collection->nextPageUrl(),
                'prev' => $collection->previousPageUrl(),
            ],
            'meta' => [
                'current_page' => $collection->currentPage(),
                'from' => $collection->firstItem(),
                'last_page' => $collection->lastPage(),
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
        int $code = Response::HTTP_FORBIDDEN
    ): JsonResponse {
        return $this->errorResponse($data, $code, $message);
    }

    /**
     * Error Response
     */
    public function errorResponse(
        $data = null,
        int $code = Response::HTTP_NOT_FOUND,
        string $message = 'Error Occurred',
        array $replaceDefaultKeys = []
    ): JsonResponse {
        $response = [
            'data' => $data,
            'message' => $message,
            'type' => 'error',
            'code' => $code,
        ];
        foreach ($replaceDefaultKeys as $key => $value) {
            $response[$key] = $value;
        }

        return response()->json(
            $response,
            $response['code']
        );
    }

    public function noContentResponse(): \Illuminate\Http\Response
    {
        return response()->noContent();
    }

    public function notFoundResponse(
        string $message = 'Not Found',
        array $data = null,
        int $code = Response::HTTP_NOT_FOUND
    ): JsonResponse {
        return $this->errorResponse($data, $code, $message);
    }

    public function createdResponse(
        array|JsonResource $data = null,
        string $message = 'Resource Created Successfully',
        int $code = Response::HTTP_CREATED
    ): JsonResponse {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'code' => $code,
            'type' => 'success',
            'showToast' => true,
        ], $code);
    }

    /**
     * @throws ValidationException
     */
    public function throwValidationException(
        Validator $validator,
        array $error = null,
        bool $showFirstErrorOnly = true
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
    ): JsonResponse {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'type' => 'error',
            'code' => $code,
        ], $code);
    }

    public function unauthorizedResponse($data): JsonResponse
    {
        return $this->errorResponse($data, Response::HTTP_UNAUTHORIZED, 'Wrong Credentials');
    }

    public function resourceOrPagination($collection)
    {
        return RequestHelper::isFirstPartyFrontend()
            ? $collection
            : $this->resourceResponse($collection);
    }
}
