<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public ?User $user = null;

    public function __construct()
    {
        $this->user = auth()->check() ? auth()->user() : null;
    }

    public function responseJson($data, $status): JsonResponse
    {
        return response()->json($data, $status);
    }

    public function successJson($data): JsonResponse
    {
        return $this->responseJson(
            data: $data,
            status: 200
        );
    }

    public function errorJson($data, $status = 500): JsonResponse
    {
        return $this->responseJson(
            data: $data,
            status: $status
        );
    }

    public function errorMessage($message, $status = 500): JsonResponse
    {
        return $this->errorJson(
            data: ['message' => $message, 'status' => false],
            status: $status
        );
    }

    public function successMessage($message): JsonResponse
    {
        return $this->successJson(
            data: ['message' => $message, 'status' => true]
        );
    }
}
