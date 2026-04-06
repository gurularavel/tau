<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Orkhan Shukurlu
 */
trait Responseable
{
    public function respondBadRequest(string $message, mixed $data = null): JsonResponse
    {
        return $this->respond(Response::HTTP_BAD_REQUEST, $message, $data);
    }

    public function respondCreated(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_CREATED, $message);
    }

    public function respondForbidden(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_FORBIDDEN, $message);
    }

    public function respondFound(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_FOUND, $message);
    }

    public function respondNotFound(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_NOT_FOUND, $message);
    }

    public function respondOk(string $message, mixed $data = null): JsonResponse
    {
        return $this->respond(Response::HTTP_OK, $message, $data);
    }

    public function respondServerError(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_INTERNAL_SERVER_ERROR, $message);
    }

    public function respondUnauthorized(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_UNAUTHORIZED, $message);
    }

    public function respondUnprocessableEntity(string $message): JsonResponse
    {
        return $this->respond(Response::HTTP_UNPROCESSABLE_ENTITY, $message);
    }

    private function respond(int $status, string $message, mixed $data = null): JsonResponse
    {
        return response()->json(['message' => $message, 'data' => $data], $status);
    }
}
